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
 * Provides a common interface for marshalling and unmarshalling PHP objects.
 */
interface MarshallerInterface
{
    /**
     * Translates a value from its memory representation to a suitable string
     * format.
     *
     * @param mixed $value
     * @return string
     */
    public function marshall(mixed $value): string;

    /**
     * Reverts a value from its string representation back to the original PHP
     * value.
     *
     * @param string $value
     * @return mixed
     */
    public function unmarshall(string $value): mixed;
}
