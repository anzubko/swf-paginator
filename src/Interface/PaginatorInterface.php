<?php declare(strict_types=1);

namespace SWF\Interface;

interface PaginatorInterface
{
    /**
     * Total number of entries (copied from arguments).
     *
     * @return int<1,max>
     */
    public function getTotalEntries(): int;

    /**
     * Number of entries per page (copied from arguments).
     *
     * @return int<1,max>
     */
    public function getEntriesPerPage(): int;

    /**
     * Number of pages per set (copied from arguments).
     *
     * @return int<1,max>
     */
    public function getPagesPerSet(): int;

    /**
     * Current number of page (copied from arguments and corrected).
     *
     * @return int<1,max>
     */
    public function getCurrentPage(): int;

    /**
     * Total number of pages.
     *
     * @return int<1,max>
     */
    public function getTotalPages(): int;

    /**
     * Previous number of page.
     *
     * @return int<1,max>|null
     */
    public function getPrevPage(): ?int;

    /**
     * Next number of page.
     *
     * @return int<1,max>|null
     */
    public function getNextPage(): ?int;

    /**
     * Start position of current set.
     *
     * @return int<1,max>
     */
    public function getStartOfSet(): int;

    /**
     * End position of current set.
     *
     * @return int<1,max>
     */
    public function getEndOfSet(): int;

    /**
     * Numbers of set (One or more numbers in array).
     *
     * @return array<int<1,max>>
     */
    public function getNumbersOfSet(): array;

    /**
     * Nearest page number of the previous set.
     *
     * @return int<1,max>|null
     */
    public function getPageOfPrevSet(): ?int;

    /**
     * Nearest page number of the next set.
     *
     * @return int<1,max>|null
     */
    public function getPageOfNextSet(): ?int;

    /**
     * Starting position of the slice.
     *
     * @return int<0,max>
     */
    public function getStartOfSlice(): int;

    /**
     * Ending position of the slice.
     *
     * @return int<0,max>
     */
    public function getEndOfSlice(): int;

    /**
     * Length of the slice.
     *
     * @return int<1,max>
     */
    public function getLengthOfSlice(): int;
}
