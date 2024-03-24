<?php declare(strict_types=1);

namespace SWF;

use SWF\Interface\PaginatorInterface;

readonly class Paginator implements PaginatorInterface
{
    /**
     * Total number of entries (copied from arguments).
     *
     * @var int<1,max>
     */
    public int $totalEntries;

    /**
     * Number of entries per page (copied from arguments).
     *
     * @var int<1,max>
     */
    public int $entriesPerPage;

    /**
     * Number of pages per set (copied from arguments).
     *
     * @var int<1,max>
     */
    public int $pagesPerSet;

    /**
     * Current number of page (copied from arguments and corrected).
     *
     * @var int<1,max>
     */
    public int $currentPage;

    /**
     * Total number of pages.
     *
     * @var int<1,max>
     */
    public int $totalPages;

    /**
     * Previous number of page
     *
     * @var int<1,max>|null
     */
    public ?int $prevPage;

    /**
     * Next number of page.
     *
     * @var int<1,max>|null
     */
    public ?int $nextPage;

    /**
     * Start position of current set.
     *
     * @var int<1,max>
     */
    public int $startOfSet;

    /**
     * End position of current set.
     *
     * @var int<1,max>
     */
    public int $endOfSet;

    /**
     * Numbers of set (One or more numbers in array).
     *
     * @var array<int<1,max>>
     */
    public array $numbersOfSet;

    /**
     * Nearest page number of the previous set.
     *
     * @var int<1,max>|null
     */
    public ?int $pageOfPrevSet;

    /**
     * Nearest page number of the next set.
     *
     * @var int<1,max>|null
     */
    public ?int $pageOfNextSet;

    /**
     * Starting position of the slice.
     *
     * @var int<0,max>
     */
    public int $startOfSlice;

    /**
     * Ending position of the slice.
     *
     * @var int<0,max>
     */
    public int $endOfSlice;

    /**
     * Length of the slice.
     *
     * @var int<1,max>
     */
    public int $lengthOfSlice;

    /**
     * Doings all calculations and stores at properties.
     */
    public function __construct(int $totalEntries, int $entriesPerPage, int $pagesPerSet, int $currentPage)
    {
        $this->totalEntries = $totalEntries;

        $this->entriesPerPage = $entriesPerPage;

        $this->pagesPerSet = $pagesPerSet;

        $this->totalPages = (int) ceil($this->totalEntries / $this->entriesPerPage);

        $this->currentPage = (int) min(max($currentPage, 1), $this->totalPages);

        $this->prevPage = $this->currentPage - 1 < 1 ? null : $this->currentPage - 1;

        $this->nextPage = $this->currentPage + 1 > $this->totalPages ? null : $this->currentPage + 1;

        $this->startOfSet = (int) ($this->pagesPerSet * floor(($this->currentPage - 1) / $this->pagesPerSet) + 1);

        $this->endOfSet = (int) min($this->startOfSet + $this->pagesPerSet - 1, $this->totalPages);

        $this->numbersOfSet = range($this->startOfSet, $this->endOfSet);

        $this->pageOfPrevSet = $this->startOfSet - 1 < 1 ? null : $this->startOfSet - 1;

        $this->pageOfNextSet = $this->endOfSet + 1 > $this->totalPages ? null : $this->endOfSet + 1;

        $this->startOfSlice = (int) (($this->currentPage - 1) * $this->entriesPerPage);

        $this->endOfSlice = (int) min($this->startOfSlice + $this->entriesPerPage - 1, $this->totalEntries - 1);

        $this->lengthOfSlice = $this->endOfSlice - $this->startOfSlice + 1;
    }

    /**
     * @inheritDoc
     */
    public function getTotalEntries(): int
    {
        return $this->totalEntries;
    }

    /**
     * @inheritDoc
     */
    public function getEntriesPerPage(): int
    {
        return $this->entriesPerPage;
    }

    /**
     * @inheritDoc
     */
    public function getPagesPerSet(): int
    {
        return $this->pagesPerSet;
    }

    /**
     * @inheritDoc
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @inheritDoc
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @inheritDoc
     */
    public function getPrevPage(): ?int
    {
        return $this->prevPage;
    }

    /**
     * @inheritDoc
     */
    public function getNextPage(): ?int
    {
        return $this->nextPage;
    }

    /**
     * @inheritDoc
     */
    public function getStartOfSet(): int
    {
        return $this->startOfSet;
    }

    /**
     * @inheritDoc
     */
    public function getEndOfSet(): int
    {
        return $this->endOfSet;
    }

    /**
     * @inheritDoc
     */
    public function getNumbersOfSet(): array
    {
        return $this->numbersOfSet;
    }

    /**
     * @inheritDoc
     */
    public function getPageOfPrevSet(): ?int
    {
        return $this->pageOfPrevSet;
    }

    /**
     * @inheritDoc
     */
    public function getPageOfNextSet(): ?int
    {
        return $this->pageOfNextSet;
    }

    /**
     * @inheritDoc
     */
    public function getStartOfSlice(): int
    {
        return $this->startOfSlice;
    }

    /**
     * @inheritDoc
     */
    public function getEndOfSlice(): int
    {
        return $this->endOfSlice;
    }

    /**
     * @inheritDoc
     */
    public function getLengthOfSlice(): int
    {
        return $this->lengthOfSlice;
    }
}
