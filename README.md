# Simplest framework pagination calculator

This class intended for organization of page-by-page navigation on some data. Basically intended for construction of page-by-page navigation panels on websites.

## Installation

```sh
composer require anzubko/swf-paginator
```

## Usage

```php

use SWF\Paginator;

$p = new Paginator(
    $totalEntries,   // total number of entries (>=1)
    $entriesPerPage, // number of entries per page (>=1)
    $pagesPerSet,    // number of pages per set (>=1)
    $currentPage,    // current number of page
);

// Get some property directly
$p->totalEntries;

// Or by method call
$p->getTotalEntries();

```
## Properties

### Slice params

- $p->startOfSlice - start position of the slice (>=0)

- $p->endOfSlice - end position of the slice (>=0)

- $p->lengthOfSlice - length of the slice (>=1)

### Statistics

- $p->totalEntries - total number of entries (>=1) (copied from arguments)

- $p->entriesPerPage - number of entries per page (>=1) (copied from arguments)

- $p->pagesPerSet - number of pages per set (>=1) (copied from arguments)

### Pages control

- $p->totalPages - total number of pages (>=1)

- $p->currentPage - current number of page (>=1) (copied from arguments and corrected)

- $p->prevPage - previous number of page (>=1 or null)

- $p->nextPage - next number of page (>=1 or null)

### Pages set control

- $p->startOfSet - start position of current set (>=1)

- $p->endOfSet - end position of current set (>=1)

- $p->pageOfPrevSet - nearest page number of the previous set (>=1 or null)

- $p->pageOfNextSet - nearest page number of the next set (>=1 or null)

- $p->numbersOfSet - numbers of set (one or more numbers >=1 in array)

## Examples

### Simple

```
             <-- previous page | next page -->
                   /                   \
           $p->prevPage            $p->nextPage
```

### Advanced

```
                    $p->currentPage
                            |
        $p->prevPage        |           $p->nextPage
                \           |                /
        <<       <       6 [7] 8 9 10       >       >>
        /               /           \                \
$p->pageOfPrevSet      /             \    $p->pageOfNextSet
                      /               \
            $p->startOfSet       $p->endOfSet
                     |                |
                    [ $p->numbersOfSet ]
```

### Statistics

```
                $p->totalPages
               /   $p->totalEntries
Total pages: 20   /
Total records: 200
Shown from 61 to 70 records
             \     \
              \     $p->startOfSlice + 1
               $p->endOfSlice + 1
```

## Notes

- Most simple way to check, needs to show navigation panel or not, is checking $p->totalPages property. Needs only, if this property > 1.

- $p->prevPage, $p->nextPage, $p->pageOfPrevSet and $p->pageOfNextSet properties must be checked for null before using.
