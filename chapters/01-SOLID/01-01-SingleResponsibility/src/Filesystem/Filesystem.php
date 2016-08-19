<?php


namespace App\Filesystem;


class Filesystem
{
    /**
     * @var string
     */
    private $directory = '/files';

    /**
     * Get / set directory with slash at the beginning.
     *
     * @param null|string $directory
     * @return null|string
     */
    public function directory($directory = null)
    {
        if (is_null($directory)) {
            return $this->directory;
        }

        return $this->directory = '/' . trim($directory, '/');
    }

    /**
     * Get relative path.
     *
     * @param null|string $append
     * @return null|string
     */
    public function relativePath($append = null)
    {
        if (is_null($append)) {
            return $this->directory();
        }

        return $this->directory() . '/' . ltrim($append, '/');
    }

    /**
     * Get absolute path.
     *
     * @param null|string $append
     * @return string
     */
    public function absolutePath($append = null)
    {
        $path = realpath(__DIR__ . '/../../' . $this->directory);

        if (is_null($append)) {
            return $path;
        }

        return $path . '/' . ltrim($append, '/');
    }

    /**
     * Save file.
     *
     * @param string $file
     * @param mixed $content
     * @param int $flag
     * @return int
     */
    public function save($file, $content, $flag = 0)
    {
        $path = $this->absolutePath($file);

        $this->prepareDirectory($path);

        return file_put_contents(
            $path,
            $content,
            $flag
        );
    }

    /**
     * Create directory if does not exist.
     *
     * @param string $path
     */
    private function prepareDirectory($path)
    {
        $directory = dirname($path);

        if (is_dir($directory)) {
            return;
        }

        mkdir($directory);
    }
}

















