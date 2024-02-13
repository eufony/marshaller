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

/**
 * Provides a marshaller implementation based on the Null Object Pattern.
 *
 * Returns the values directly without any modification.
 *
 * This marshaller can only take string values.
 */
class NullMarshaller implements MarshallerInterface
{
    /**
     * @inheritDoc
     */
    public function marshall(mixed $value): string
    {
        if (!is_string($value)) {
            throw new MarshallerException("A null marshaller cannot marshall non-string values");
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function unmarshall(string $value): mixed
    {
        return $value;
    }
}
