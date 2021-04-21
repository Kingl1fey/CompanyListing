<?php

namespace App\Entity;

use App\Repository\LegalFormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LegalFormRepository::class)
 */
class LegalForm
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
     * @ORM\OneToMany(targetEntity=Company::class, mappedBy="legalForm")
     */
    private $companies;

    /**
     * @ORM\OneToMany(targetEntity=CompanyHistory::class, mappedBy="legalform")
     */
    private $companyHistories;

    public function __construct()
    {
        $this->companies = new ArrayCollection();
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

    /**
     * @return Collection|Company[]
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->setLegalForm($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->removeElement($company)) {
            // set the owning side to null (unless already changed)
            if ($company->getLegalForm() === $this) {
                $company->setLegalForm(null);
            }
        }

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
            $companyHistory->setLegalform($this);
        }

        return $this;
    }

    public function removeCompanyHistory(CompanyHistory $companyHistory): self
    {
        if ($this->companyHistories->removeElement($companyHistory)) {
            // set the owning side to null (unless already changed)
            if ($companyHistory->getLegalform() === $this) {
                $companyHistory->setLegalform(null);
            }
        }

        return $this;
    }
}
