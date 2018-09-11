<?php

namespace WPAssure\PHPUnit\Constraints\Traits;

use Facebook\WebDriver\Remote\RemoteWebElement;

trait ElementToMessage {

	/**
	 * Convert an element to a piece of a failure message.
	 *
	 * @access protected
	 * @param \Facebook\WebDriver\Remote\RemoteWebElement|string $element An element to convert.
	 * @return string A message.
	 */
	protected function _elementToMessage( $element ) {
		if ( is_string( $element ) && ! empty( $element ) ) {
			return sprintf( ' "%s" selector', $element );
		} elseif ( $element instanceof RemoteWebElement ) {
			$message = ' ' . $element->getTagName();

			$id = trim( $element->getID() );
			if ( ! empty( $id ) ) {
				$message .= '#' . $id;
			}

			$class = trim( $element->getAttribute( 'class' ) );
			if ( ! empty( $class ) ) {
				$classes = array_filter( array_map( 'trim', split( ' ', $class ) ) );
				if ( ! empty( $classes ) ) {
					$message .= '.' . implode( '.', $classes );
				}
			}

			$message .= ' tag';
		}

		return '';
	}

}
