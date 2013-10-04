<?php

/**
 * @package assegai.modules.paginator
 *
 * PDO provider for the paginator.
 */
class PaginatorPdoProvider implements IPaginatorProvider {
    protected $stmt;
    protected $fetchType = PDO::FETCH_ASSOC;

    public function __construct(PDOStatement $stmt) {
        $this->stmt = $stmt;
    }

    public function fetchType($type) {
        $this->fetchType = $type;
    }

    public function count() {
        return $this->stmt->rowCount();
    }
    
    public function getPage($pagenum, $pagelength) {
        $start = ($pagenum - 1) * $pagelength;

        // Let's move the statement cursor to the beginning of the page.
        for($i = 0; $i < $start; $i++) {
            $this->stmt->fetch();
        }

        // Now we're getting the page itself.
        $page = array();
        for($i = 1; $i < $pagelength; $i++) {
            $page[] = $this->stmt->fetch($this->fetchType);
        }

        return $page;
    }
}

