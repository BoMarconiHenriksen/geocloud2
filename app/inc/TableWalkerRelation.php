<?php

namespace app\inc;

use sad_spirit\pg_builder\nodes;
use sad_spirit\pg_builder\nodes\range\UpdateOrDeleteTarget;
use sad_spirit\pg_builder\BlankWalker;
use sad_spirit\pg_builder\nodes\range\RelationReference;


class TableWalkerRelation extends BlankWalker
{
    /**
     * @var array<string>
     */
    private $relations;

    public function walkRelationReference(RelationReference $rangeItem): void
    {
        $this->relations[] = (string)$rangeItem->name;
    }

    public function walkUpdateOrDeleteTarget(UpdateOrDeleteTarget $target): void
    {
        $this->relations[] = (string)$target->relation->schema . "." . (string)$target->relation->relation;
    }

    public function walkInsertTarget(nodes\range\InsertTarget $target)
    {
        $this->relations[] = (string)$target->relation->schema . "." . (string)$target->relation->relation;
    }

    /**
     * @return array<string>
     */
    public function getRelations(): array
    {
        return $this->relations;
    }
}
