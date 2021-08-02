<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estManuel;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=0)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCarburant::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeCarburant;

    /**
     * @ORM\ManyToOne(targetEntity=Photo::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieVoiture::class, inversedBy="annonces")
     */
    private $categorieVoiture;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="annonces")
     */
    private $garage;

    public function __construct()
    {
        $this->categorieVoiture = new ArrayCollection();
        $this->garage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getDatePost(): ?\DateTimeInterface
    {
        return $this->datePost;
    }

    public function setDatePost(\DateTimeInterface $datePost): self
    {
        $this->datePost = $datePost;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getEstManuel(): ?bool
    {
        return $this->estManuel;
    }

    public function setEstManuel(bool $estManuel): self
    {
        $this->estManuel = $estManuel;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getTypeCarburant(): ?TypeCarburant
    {
        return $this->typeCarburant;
    }

    public function setTypeCarburant(?TypeCarburant $typeCarburant): self
    {
        $this->typeCarburant = $typeCarburant;

        return $this;
    }

    public function getPhoto(): ?Photo
    {
        return $this->photo;
    }

    public function setPhoto(?Photo $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection|CategorieVoiture[]
     */
    public function getCategorieVoiture(): Collection
    {
        return $this->categorieVoiture;
    }

    public function addCategorieVoiture(CategorieVoiture $categorieVoiture): self
    {
        if (!$this->categorieVoiture->contains($categorieVoiture)) {
            $this->categorieVoiture[] = $categorieVoiture;
        }

        return $this;
    }

    public function removeCategorieVoiture(CategorieVoiture $categorieVoiture): self
    {
        $this->categorieVoiture->removeElement($categorieVoiture);

        return $this;
    }

    /**
     * @return Collection|Garage[]
     */
    public function getGarage(): Collection
    {
        return $this->garage;
    }

    public function addGarage(Garage $garage): self
    {
        if (!$this->garage->contains($garage)) {
            $this->garage[] = $garage;
        }

        return $this;
    }

    public function removeGarage(Garage $garage): self
    {
        $this->garage->removeElement($garage);

        return $this;
    }
}
