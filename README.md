# SWF Paginator

This class intended for organization of page-by-page navigation on some data. Basically intended for construction of page-by-page navigation panels on websites.

## Installation

```sh
composer require anzubko/swf-paginator
```

## Usage

```php

use SWF\Paginator;

$pg = new Paginator(
    $totalEntries,   // total number of entries (>=1)
    $entriesPerPage, // number of entries per page (>=1)
    $pagesPerSet,    // number of pages per set (>=1)
    $currentPage     // current number of page
);

// Get some property directly
$pg->totalEntries;

// Or by method call
$pg->getTotalEntries();

```
## Properties

### Slice params

- $pg->startOfSlice - start position of the slice (>=0)

- $pg->endOfSlice - end position of the slice (>=0)

- $pg->lengthOfSlice - length of the slice (>=1)

### Statistics

- $pg->totalEntries - total number of entries (>=1) (copied from arguments)

- $pg->entriesPerPage - number of entries per page (>=1) (copied from arguments)

- $pg->pagesPerSet - number of pages per set (>=1) (copied from arguments)

### Pages control

- $pg->totalPages - total number of pages (>=1)

- $pg->currentPage - current number of page (>=1) (copied from arguments and corrected)

- $pg->prevPage - previous number of page (>=1 or null)

- $pg->nextPage - next number of page (>=1 or null)

### Pages set control

- $pg->startOfSet - start position of current set (>=1)

- $pg->endOfSet - end position of current set (>=1)

- $pg->pageOfPrevSet - nearest page number of the previous set (>=1 or null)

- $pg->pageOfNextSet - nearest page number of the next set (>=1 or null)

- $pg->numbersOfSet - numbers of set (one or more numbers >=1 in array)

## Examples

### Simple

```
             <-- previous page | next page -->
                   /                   \
           $pg->prevPage            $pg->nextPage
```

### Advanced

```
                    $pg->currentPage
                            |
        $pg->prevPage       |           $pg->nextPage
                \           |                /
        <<       <       6 [7] 8 9 10       >       >>
        /               /           \                \
$pg->pageOfPrevSet     /             \    $pg->pageOfNextSet
                      /               \
            $pg->startOfSet       $pg->endOfSet
                     |                 |
                    [ $pg->numbersOfSet ]
```

### Statistics

```
                $pg->totalPages
               /   $pg->totalEntries
Total pages: 20   /
Total records: 200
Shown from 61 to 70 records
             \     \
              \     $pg->startOfSlice + 1
               $pg->endOfSlice + 1
```

## Notes

- Most simple way to check, needs to show navigation panel or not, is checking $pg->totalPages property. Needs only, if this property > 1.

- $pg->prevPage, $pg->nextPage, $pg->pageOfPrevSet and $pg->pageOfNextSet properties must be checked for null before using.
