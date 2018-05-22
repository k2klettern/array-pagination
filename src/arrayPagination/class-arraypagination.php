<?php

namespace arrayPagination;
	/**
	 * Class arrayPagination
	 *
	 * Get an array and set a pagination returning filtered array and printing pagination prev-next links
	 *
	 * author: Eric Zeidan
	 */
	class thePagination {

		public static $instance;

		public $arrayToPaginate;
		private $totalPages;
		private $page;
		public $getVariable = "pagegal";
		public $limit = 8;
		public $link = '?pagegal=%d';

		public function __construct() {

		}

		public static function get_instance() {
			if ( empty( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * @param $arrayToPaginate
		 *
		 * Set the array for pagination
		 */
		public function setArray($arrayToPaginate) {
				$this->arrayToPaginate = $arrayToPaginate;
		}

		public function getPagination() {
			if(isset($this->arrayToPaginate)) {
				$page             = ! empty( $_GET[ $this->getVariable ] ) ? (int) $_GET[ $this->getVariable ] : 1;
				$total            = count( $this->arrayToPaginate );
				$this->totalPages = ceil( $total / $this->limit );
				$page             = max( $page, 1 );
				$page             = min( $page, $this->totalPages );
				$offset           = ( $page - 1 ) * $this->limit;
				if ( $offset < 0 ) {
					$offset = 0;
				}

				$arrayToShow = array_slice( $this->arrayToPaginate, $offset, $this->limit );

				return $arrayToShow;
			}
		}

		/**
		 * Prints the Pagination of given array
		 */
		public function theArrayPagination() {

			$pagerContainer = '<div class="pagination">';
			if( $this->totalPages != 0 )
			{
				if( $this->page == 1 )
				{
					$pagerContainer .= '';
				}
				else
				{
					$pagerContainer .= sprintf( '<span><a href="' . $this->link . '" > &#171; prev</a></div>', $this->page - 1 );
				}
				$pagerContainer .= ' <div class="col-md-6 text-center"> page <strong>' . $this->page . '</strong> of ' . $this->totalPages . '</div>';
				if( $this->page == $this->totalPages )
				{
					$pagerContainer .= '';
				}
				else
				{
					$pagerContainer .= sprintf( '<a class="nextgal" href="' . $this->link . '" > next &#187; </a>', $this->page + 1 );
				}
			}
			$pagerContainer .= '</div>';

			echo $pagerContainer;
		}
	}
