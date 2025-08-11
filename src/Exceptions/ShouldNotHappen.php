<?php

declare(strict_types = 1);

namespace Pekral\HttpClient\Exceptions;

use Exception;

/**
 * Exception thrown when an unexpected condition occurs.
 *
 * This exception is used to indicate that something that should never happen
 * has occurred, typically indicating a bug or unexpected state.
 */
final class ShouldNotHappen extends Exception
{

}
