<?php

namespace App\Entity;

use App\Repository\LoanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoanRepository::class)]
class Loan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'loans')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $borrower = null;

    /**
     * @var Collection<int, Book>
     */
    #[ORM\OneToMany(targetEntity: Book::class, mappedBy: 'loan')]
    private Collection $book;

    #[ORM\Column]
    private ?\DateTimeImmutable $borrow_date = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $return_date = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $real_return_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrower(): ?User
    {
        return $this->borrower;
    }

    public function setBorrower(?User $borrower): static
    {
        $this->borrower = $borrower;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    public function addBook(Book $book): static
    {
        if (!$this->book->contains($book)) {
            $this->book->add($book);
            $book->setLoan($this);
        }

        return $this;
    }

    public function removeBook(Book $book): static
    {
        if ($this->book->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getLoan() === $this) {
                $book->setLoan(null);
            }
        }

        return $this;
    }

    public function getBorrowDate(): ?\DateTimeImmutable
    {
        return $this->borrow_date;
    }

    public function setBorrowDate(\DateTimeImmutable $borrow_date): static
    {
        $this->borrow_date = $borrow_date;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeImmutable
    {
        return $this->return_date;
    }

    public function setReturnDate(\DateTimeImmutable $return_date): static
    {
        $this->return_date = $return_date;

        return $this;
    }

    public function getRealReturnDate(): ?\DateTimeImmutable
    {
        return $this->real_return_date;
    }

    public function setRealReturnDate(\DateTimeImmutable $real_return_date): static
    {
        $this->real_return_date = $real_return_date;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
}
