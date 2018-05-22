# arrayPagination
Class to Paginate results from an array
by Eric Zeidan
k2klettern@gmail.com

How to use it

Clone in your vendor/

Install via composer update

To get the Pagination just instantiate the class

$arrayToPaginate;

$c = new \arrayPagination\thePagination();
$c->setArray($arrayToPaginate);
$arrayFiltered = $c->getPagination();

Do whatever you want with your array filtered

print the pagination

$c->theArrayPagination();
