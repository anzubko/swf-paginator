<?php declare(strict_types=1);

namespace SWF\Interface;

interface PaginatorInterface
{
    /**
     * Total number of entries (>=1) (copied from arguments).
     */
    public function getTotalEntries(): int;

    /**
     * Number of entries per page (>=1) (copied from arguments).
     */
    public function getEntriesPerPage(): int;

    /**
     * Number of pages per set (>=1) (copied from arguments).
     */
    public function getPagesPerSet(): int;

    /**
     * Current number of page (>=1) (copied from arguments and corrected).
     */
    public function getCurrentPage(): int;

    /**
     * Total number of pages (>=1).
     */
    public function getTotalPages(): int;

    /**
     * Previous number of page (>=1 or null)
     */
    public function getPrevPage(): ?int;

    /**
     * Next number of page (>=1 or null).
     */
    public function getNextPage(): ?int;

    /**
     * Start position of current set (>=1).
     */
    public function getStartOfSet(): int;

    /**
     * End position of current set (>=1).
     */
    public function getEndOfSet(): int;

    /**
     * Numbers of set (One or more numbers (>=1) in array).
     *
     * @return int[]
     */
    public function getNumbersOfSet(): array;

    /**
     * Nearest page number of the previous set (>=1 or null).
     */
    public function getPageOfPrevSet(): ?int;

    /**
     * Nearest page number of the next set (>=1 or null).
     */
    public function getPageOfNextSet(): ?int;

    /**
     * Starting position of the slice (>=0).
     */
    public function getStartOfSlice(): int;

    /**
     * Ending position of the slice (>=0).
     */
    public function getEndOfSlice(): int;

    /**
     * Length of the slice (>=1).
     */
    public function getLengthOfSlice(): int;
}
