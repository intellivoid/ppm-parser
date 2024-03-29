<?php declare(strict_types=1);

    namespace PpmParser\Builder;

    use LogicException;
    use PpmParser;
    use PpmParser\BuilderHelpers;
    use PpmParser\Node\Stmt;

    /**
     * Class Trait_
     * @package PpmParser\Builder
     */
    class Trait_ extends Declaration
    {
        protected $name;
        protected $uses = [];
        protected $properties = [];
        protected $methods = [];

        /**
         * Creates an interface builder.
         *
         * @param string $name Name of the interface
         */
        public function __construct(string $name)
        {
            $this->name = $name;
        }

        /**
         * Adds a statement.
         *
         * @param Stmt|PpmParser\Builder $stmt The statement to add
         *
         * @return $this The builder instance (for fluid interface)
         */
        public function addStmt($stmt)
        {
            $stmt = BuilderHelpers::normalizeNode($stmt);

            if ($stmt instanceof Stmt\Property)
            {
                $this->properties[] = $stmt;
            }
            elseif ($stmt instanceof Stmt\ClassMethod)
            {
                $this->methods[] = $stmt;
            }
            elseif ($stmt instanceof Stmt\TraitUse)
            {
                $this->uses[] = $stmt;
            }
            else
            {
                throw new LogicException(sprintf('Unexpected node of type "%s"', $stmt->getType()));
            }

            return $this;
        }

        /**
         * Returns the built trait node.
         *
         * @return Stmt\Trait_ The built interface node
         */
        public function getNode() : PpmParser\Node
        {
            return new Stmt\Trait_(
                $this->name, [
                    'stmts' => array_merge($this->uses, $this->properties, $this->methods)
                ], $this->attributes
            );
        }
    }
