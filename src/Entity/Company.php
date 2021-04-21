<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $siren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $registrationCity;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registrationDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $capital;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $streetNumber1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wayType1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wayName1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city1;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $postCode1;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $streetNumber2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wayType2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wayName2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city2;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $postCode2;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $streetNumber3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $waytype3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wayName3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city3;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $postCode3;

    /**
     * @ORM\ManyToOne(targetEntity=LegalForm::class, inversedBy="companies")
     */
    private $legalForm;

    /**
     * @ORM\OneToMany(targetEntity=CompanyHistory::class, mappedBy="company")
     */
    private $companyHistories;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->companyHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function setSiren(string $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getRegistrationCity(): ?string
    {
        return $this->registrationCity;
    }

    public function setRegistrationCity(string $registrationCity): self
    {
        $this->registrationCity = $registrationCity;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getCapital(): ?int
    {
        return $this->capital;
    }

    public function setCapital(int $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getStreetNumber1(): ?string
    {
        return $this->streetNumber1;
    }

    public function setStreetNumber1(string $streetNumber1): self
    {
        $this->streetNumber1 = $streetNumber1;

        return $this;
    }

    public function getWayType1(): ?string
    {
        return $this->wayType1;
    }

    public function setWayType1(string $wayType1): self
    {
        $this->wayType1 = $wayType1;

        return $this;
    }

    public function getWayName1(): ?string
    {
        return $this->wayName1;
    }

    public function setWayName1(string $wayName1): self
    {
        $this->wayName1 = $wayName1;

        return $this;
    }

    public function getCity1(): ?string
    {
        return $this->city1;
    }

    public function setCity1(string $city1): self
    {
        $this->city1 = $city1;

        return $this;
    }

    public function getPostCode1(): ?string
    {
        return $this->postCode1;
    }

    public function setPostCode1(string $postCode1): self
    {
        $this->postCode1 = $postCode1;

        return $this;
    }

    public function getStreetNumber2(): ?string
    {
        return $this->streetNumber2;
    }

    public function setStreetNumber2(?string $streetNumber2): self
    {
        $this->streetNumber2 = $streetNumber2;

        return $this;
    }

    public function getWayType2(): ?string
    {
        return $this->wayType2;
    }

    public function setWayType2(?string $wayType2): self
    {
        $this->wayType2 = $wayType2;

        return $this;
    }

    public function getWayName2(): ?string
    {
        return $this->wayName2;
    }

    public function setWayName2(?string $wayName2): self
    {
        $this->wayName2 = $wayName2;

        return $this;
    }

    public function getCity2(): ?string
    {
        return $this->city2;
    }

    public function setCity2(?string $city2): self
    {
        $this->city2 = $city2;

        return $this;
    }

    public function getPostCode2(): ?string
    {
        return $this->postCode2;
    }

    public function setPostCode2(string $postCode2): self
    {
        $this->postCode2 = $postCode2;

        return $this;
    }

    public function getStreetNumber3(): ?string
    {
        return $this->streetNumber3;
    }

    public function setStreetNumber3(?string $streetNumber3): self
    {
        $this->streetNumber3 = $streetNumber3;

        return $this;
    }

    public function getWaytype3(): ?string
    {
        return $this->waytype3;
    }

    public function setWaytype3(?string $waytype3): self
    {
        $this->waytype3 = $waytype3;

        return $this;
    }

    public function getWayName3(): ?string
    {
        return $this->wayName3;
    }

    public function setWayName3(?string $wayName3): self
    {
        $this->wayName3 = $wayName3;

        return $this;
    }

    public function getCity3(): ?string
    {
        return $this->city3;
    }

    public function setCity3(?string $city3): self
    {
        $this->city3 = $city3;

        return $this;
    }

    public function getPostCode3(): ?string
    {
        return $this->postCode3;
    }

    public function setPostCode3(?string $postCode3): self
    {
        $this->postCode3 = $postCode3;

        return $this;
    }

    public function getLegalForm(): ?LegalForm
    {
        return $this->legalForm;
    }

    public function setLegalForm(?LegalForm $legalForm): self
    {
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * @return Collection|CompanyHistory[]
     */
    public function getCompanyHistories(): Collection
    {
        return $this->companyHistories;
    }

    public function addCompanyHistory(CompanyHistory $companyHistory): self
    {
        if (!$this->companyHistories->contains($companyHistory)) {
            $this->companyHistories[] = $companyHistory;
            $companyHistory->setCompany($this);
        }

        return $this;
    }

    public function removeCompanyHistory(CompanyHistory $companyHistory): self
    {
        if ($this->companyHistories->removeElement($companyHistory)) {
            // set the owning side to null (unless already changed)
            if ($companyHistory->getCompany() === $this) {
                $companyHistory->setCompany(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
