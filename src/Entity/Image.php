<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url(
     *  message = "Ce n'est pas une URL valide"
     * )
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10, minMessage="Le titre de l'image doit faire au moins 10 caractères")
     */
    private $caption;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ad", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    public function getAd(): ?ad
    {
        return $this->ad;
    }

    public function setAd(?ad $ad): self
    {
        $this->ad = $ad;

        return $this;
    }
}
