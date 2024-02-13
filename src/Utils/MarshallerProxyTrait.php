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

namespace Eufony\Marshaller\Utils;

use Eufony\Marshaller\MarshallerInterface;

/**
 * Provides common functionality for wrapping a Marshaller implementation in a
 * proxy class.
 *
 * Inheriting classes must set the `$marshaller` field in the object
 * constructor.
 */
trait MarshallerProxyTrait
{
    /**
     * The marshaller used internally to provide the real marshalling
     * implementation.
     *
     * @var \Eufony\Marshaller\MarshallerInterface $marshaller
     */
    protected MarshallerInterface $marshaller;

    /**
     * Returns the internal marshaller.
     *
     * @return \Eufony\Marshaller\MarshallerInterface
     */
    public function marshaller(): MarshallerInterface
    {
        return $this->marshaller;
    }

    /**
     * @inheritDoc
     */
    public function marshall(mixed $value): string
    {
        return $this->marshaller->marshall($value);
    }

    /**
     * @inheritDoc
     */
    public function unmarshall(string $value): mixed
    {
        return $this->marshaller->unmarshall($value);
    }
}
