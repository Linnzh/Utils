<?php


namespace Linnzh\Utils\Iterator;


class CsvIterator implements \Iterator
{
    public const ROW_SIZE = 4096;

    /**
     * The pointer to the CSV file.
     *
     * @var resource
     */
    protected $filePointer = null;

    /**
     * The current element, which is returned on each iteration.
     *
     * @var mixed
     */
    protected mixed $currentElement = null;

    /**
     * The row counter.
     *
     * @var int|null
     */
    protected ?int $rowCounter = null;

    /**
     * The delimiter for the CSV file.
     *
     * @var string|null
     */
    protected ?string $delimiter = null;

    /**
     * The constructor tries to open the CSV file. It throws an exception on
     * failure.
     *
     * @param string $file The CSV file.
     * @param string $delimiter The delimiter.
     *
     * @throws \Exception
     */
    public function __construct(string $file, string $delimiter = ',')
    {
        try {
            $this->filePointer = fopen($file, 'rb');
            $this->delimiter = $delimiter;
        } catch (\Exception $e) {
            throw new \RuntimeException('The file "' . $file . '" cannot be read.');
        }
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        $this->currentElement = fgetcsv($this->filePointer, self::ROW_SIZE, $this->delimiter);
        $this->rowCounter++;

        return $this->currentElement;
    }

    /**
     * @inheritDoc
     */
    public function next(): bool
    {
        if (is_resource($this->filePointer)) {
            return !feof($this->filePointer);
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->rowCounter;
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        if (!$this->next()) {
            if (is_resource($this->filePointer)) {
                fclose($this->filePointer);
            }

            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->rowCounter = 0;
        rewind($this->filePointer);
    }
}
