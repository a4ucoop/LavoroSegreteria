<?php
// src/Acme/TaskBundle/Form/DataTransformer/IssueToNumberTransformer.php
namespace A4U\FormBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use A4U\FromBundle\Entity\Stage;
use A4U\DataBundle\Entity\StuAnagScuole;

class regObjToStringTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (regione) to a string (regione).
     *
     * @param  StuAnagScuole|null $regione
     * @return string
     */
    public function transform($regione)
    {
        if (null === $regione) {
            return "";
        }

        return $regione->getRegione();
    }

    /**
     * Transforms a string (regione) to an object (scuola).
     *
     * @param  string $regione
     *
     * @return StuAnagScuole|null
     *
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($regione)
    {
        if (!$regione) {
            return null;
        }

        $scuola = $this->om
            ->getRepository('A4UDataBundle:StuAnagScuole')
            ->findOneBy(array('regione' => $regione))
        ;

        if (null === $regioneObj) {
            throw new TransformationFailedException(sprintf(
                'A school with regione "%s" does not exist!',
                $regione
            ));
        }

        return $scuola;
    }
}