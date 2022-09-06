<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\StructureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: StructureRepository::class)]
class Structure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\NotNull()]
    private ?string $nameStructure = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\NotNull()]
    private ?string $nameResponsable = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseStructure = null;

    #[ORM\Column]
    private ?bool $activeStructure = null;

    #[ORM\Column]
    private ?bool $membersRead = null;

    #[ORM\Column]
    private ?bool $membersWrite = null;

    #[ORM\Column]
    private ?bool $membersProduct = null;

    #[ORM\Column]
    private ?bool $membersPayment = null;

    #[ORM\Column]
    private ?bool $membersStistiquesRead = null;

    #[ORM\Column]
    private ?bool $membersSubscriptionRead = null;

    #[ORM\Column]
    private ?bool $paymentSchedulesRead = null;

    #[ORM\Column]
    private ?bool $paymentShedulesWrite = null;

    #[ORM\Column]
    private ?bool $paymentDaysRead = null;

    #[ORM\Column]
    private ?bool $paymentDaysWrite = null;

    #[ORM\ManyToOne(inversedBy: 'structures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Partenaire $partenaire = null;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameStructure(): ?string
    {
        return $this->nameStructure;
    }

    public function setNameStructure(string $nameStructure): self
    {
        $this->nameStructure = $nameStructure;

        return $this;
    }

    public function getNameResponsable(): ?string
    {
        return $this->nameResponsable;
    }

    public function setNameResponsable(string $nameResponsable): self
    {
        $this->nameResponsable = $nameResponsable;

        return $this;
    }

    public function getAdresseStructure(): ?string
    {
        return $this->adresseStructure;
    }

    public function setAdresseStructure(?string $adresseStructure): self
    {
        $this->adresseStructure = $adresseStructure;

        return $this;
    }

    public function getActiveStructure(): ?bool
    {
        return $this->activeStructure;
    }

    public function setActiveStructure(bool $activeStructure): self
    {
        $this->activeStructure = $activeStructure;

        return $this;
    }

    public function isMembersRead(): ?bool
    {
        return $this->membersRead;
    }

    public function setMembersRead(bool $membersRead): self
    {
        $this->membersRead = $membersRead;

        return $this;
    }

    public function isMembersWrite(): ?bool
    {
        return $this->membersWrite;
    }

    public function setMembersWrite(bool $membersWrite): self
    {
        $this->membersWrite = $membersWrite;

        return $this;
    }

    public function isMembersProduct(): ?bool
    {
        return $this->membersProduct;
    }

    public function setMembersProduct(bool $membersProduct): self
    {
        $this->membersProduct = $membersProduct;

        return $this;
    }

    public function isMembersPayment(): ?bool
    {
        return $this->membersPayment;
    }

    public function setMembersPayment(bool $membersPayment): self
    {
        $this->membersPayment = $membersPayment;

        return $this;
    }

    public function isMembersStistiquesRead(): ?bool
    {
        return $this->membersStistiquesRead;
    }

    public function setMembersStistiquesRead(bool $membersStistiquesRead): self
    {
        $this->membersStistiquesRead = $membersStistiquesRead;

        return $this;
    }

    public function isMembersSubscriptionRead(): ?bool
    {
        return $this->membersSubscriptionRead;
    }

    public function setMembersSubscriptionRead(bool $membersSubscriptionRead): self
    {
        $this->membersSubscriptionRead = $membersSubscriptionRead;

        return $this;
    }

    public function isPaymentSchedulesRead(): ?bool
    {
        return $this->paymentSchedulesRead;
    }

    public function setPaymentSchedulesRead(bool $paymentSchedulesRead): self
    {
        $this->paymentSchedulesRead = $paymentSchedulesRead;

        return $this;
    }

    public function isPaymentShedulesWrite(): ?bool
    {
        return $this->paymentShedulesWrite;
    }

    public function setPaymentShedulesWrite(bool $paymentShedulesWrite): self
    {
        $this->paymentShedulesWrite = $paymentShedulesWrite;

        return $this;
    }

    public function isPaymentDaysRead(): ?bool
    {
        return $this->paymentDaysRead;
    }

    public function setPaymentDaysRead(bool $paymentDaysRead): self
    {
        $this->paymentDaysRead = $paymentDaysRead;

        return $this;
    }

    public function isPaymentDaysWrite(): ?bool
    {
        return $this->paymentDaysWrite;
    }

    public function setPaymentDaysWrite(bool $paymentDaysWrite): self
    {
        $this->paymentDaysWrite = $paymentDaysWrite;

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaire $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }
}
