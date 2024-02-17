<?php
/*
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

namespace Eufony\Marshaller;

use Eufony\Marshaller\Utils\MarshallerProxyTrait;

/**
 * Provides a marshaller implementation that wraps another implementation and
 * encodes / decodes its return values in base64 before passing it further
 * along.
 */
class Base64Marshaller implements MarshallerInterface
{
    use MarshallerProxyTrait;

    /**
     * Class constructor.
     * Wraps another marshaller implementation and encodes / decodes its values in
     * base64.
     *
     * If no marshaller is given, defaults to a `SerializeMarshaller`.
     *
     * @param \Eufony\Marshaller\MarshallerInterface|null $marshaller
     */
    public function __construct(?MarshallerInterface $marshaller = null)
    {
        $this->marshaller = $marshaller ?? new SerializeMarshaller();
    }

    /**
     * @inheritDoc
     */
    public function marshall(mixed $value): string
    {
        return base64_encode($this->marshaller->marshall($value));
    }

    /**
     * @inheritDoc
     */
    public function unmarshall(string $value): mixed
    {
        $value = base64_decode($value, strict: true);

        if ($value === false) {
            throw new MarshallerException("Given value is not a base64 encoded string");
        }

        return $this->marshaller->unmarshall($value);
    }
}
