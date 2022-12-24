<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\SynopsisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * 
 * @ORM\Entity(repositoryClass=SynopsisRepository::class)
 * @[ApiResource]
 * @UniqueEntity(
 * fields={"NomAnime"},
 *
 * message="Cette anime est déjà enregistré"
 * )
 * 
 */
class Synopsis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $NomAnime;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $TitreAlter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Theme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Origine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Studio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AgeConseiller;

    /**
     * @ORM\Column(type="string")
     */
    private $NombreEpisode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreOrigin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateDiffusion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PubliAverti;

    /**
     * @ORM\Column(type="text")
     */
    private $Synopsis;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $AnimeImage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAnime(): ?string
    {
        return $this->NomAnime;
    }

    public function setNomAnime(string $NomAnime): self
    {
        $this->NomAnime = $NomAnime;

        return $this;
    }

    public function getTitreAlter(): ?string
    {
        return $this->TitreAlter;
    }

    public function setTitreAlter(string $TitreAlter): self
    {
        $this->TitreAlter = $TitreAlter;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->Theme;
    }

    public function setTheme(string $Theme): self
    {
        $this->Theme = $Theme;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->Origine;
    }

    public function setOrigine(string $Origine): self
    {
        $this->Origine = $Origine;

        return $this;
    }

    public function getStudio(): ?string
    {
        return $this->Studio;
    }

    public function setStudio(string $Studio): self
    {
        $this->Studio = $Studio;

        return $this;
    }

    public function getAgeConseiller(): ?string
    {
        return $this->AgeConseiller;
    }

    public function setAgeConseiller(string $AgeConseiller): self
    {
        $this->AgeConseiller = $AgeConseiller;

        return $this;
    }

    public function getNombreEpisode(): ?float
    {
        return $this->NombreEpisode;
    }

    public function setNombreEpisode(float $NombreEpisode): self
    {
        $this->NombreEpisode = $NombreEpisode;

        return $this;
    }

    public function getTitreOrigin(): ?string
    {
        return $this->titreOrigin;
    }

    public function setTitreOrigin(string $titreOrigin): self
    {
        $this->titreOrigin = $titreOrigin;

        return $this;
    }

    public function getDateDiffusion(): ?string
    {
        return $this->dateDiffusion;
    }

    public function setDateDiffusion($dateDiffusion): self
    {
        $this->dateDiffusion = $dateDiffusion;

        return $this;
    }

    public function getPubliAverti(): ?string
    {
        return $this->PubliAverti;
    }

    public function setPubliAverti($PubliAverti): self
    {
        $this->PubliAverti = $PubliAverti;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->Synopsis;
    }

    public function setSynopsis(string $Synopsis): self
    {
        $this->Synopsis = $Synopsis;

        return $this;
    }

    public function getAnimeImage(): ?string
    {
        return $this->AnimeImage;
    }

    public function setAnimeImage(string $AnimeImage): self
    {
        $this->AnimeImage = $AnimeImage;

        return $this;
    }
}
