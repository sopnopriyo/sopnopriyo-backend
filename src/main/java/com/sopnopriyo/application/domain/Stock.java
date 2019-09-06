package com.sopnopriyo.application.domain;

import org.hibernate.annotations.Cache;
import org.hibernate.annotations.CacheConcurrencyStrategy;

import javax.persistence.*;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import java.io.Serializable;
import java.time.Instant;
import java.util.Objects;

/**
 * A Stock.
 */
@Entity
@Table(name = "stock")
@Cache(usage = CacheConcurrencyStrategy.NONSTRICT_READ_WRITE)
public class Stock implements Serializable {

	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Long id;

	@NotNull
	@Size(max = 191)
	@Column(name = "code", length = 255, nullable = false)
	private String code;

	@NotNull
	@Size(max = 191)
	@Column(name = "company_name", length = 255, nullable = false)
	private String companyName;


	@NotNull
	@Column(name = "cost_per_share", nullable = false)
	private Double costPerShare;

	@NotNull
	@Column(name = "total_quantity")
	private Integer totalQuantity;

	@NotNull
	@Column(name = "purchase_date", nullable = false)
	private Instant purchaseDate;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getCode() {
		return code;
	}

	public Stock code(String code) {
		this.code = code;
		return this;
	}

	public void setCode(String code) {
		this.code = code;
	}

	public String getCompanyName() {
		return companyName;
	}

	public Stock companyName(String companyName) {
		this.companyName = companyName;
		return this;
	}

	public void setCompanyName(String companyName) {
		this.companyName = companyName;
	}

	public Double getCostPerShare() {
		return costPerShare;
	}

	public Stock costPerShare(Double costPerShare) {
		this.costPerShare = costPerShare;
		return this;
	}

	public void setCostPerShare(Double costPerShare) {
		this.costPerShare = costPerShare;
	}

	public Integer getTotalQuantity() {
		return totalQuantity;
	}

	public Stock totalQuantity(Integer totalQuantity) {
		this.totalQuantity = totalQuantity;
		return this;
	}

	public void setTotalQuantity(Integer totalQuantity) {
		this.totalQuantity = totalQuantity;
	}

	public Instant getPurchaseDate() {
		return purchaseDate;
	}

	public Stock purchaseDate(Instant purchaseDate) {
		this.purchaseDate = purchaseDate;
		return this;
	}

	public void setPurchaseDate(Instant purchaseDate) {
		this.purchaseDate = purchaseDate;
	}

	@Override
	public boolean equals(Object o) {
		if (this == o) {
			return true;
		}
		if (o == null || getClass() != o.getClass()) {
			return false;
		}
		Stock stock = (Stock) o;
		if (stock.getId() == null || getId() == null) {
			return false;
		}
		return Objects.equals(getId(), stock.getId());
	}

	@Override
	public int hashCode() {
		return Objects.hashCode(getId());
	}

	@Override
	public String toString() {
		return "Stock{" +
				"id=" + getId() +
				", code='" + getCode() + '\'' +
				", companyName='" + getCompanyName() + '\'' +
				", costPerShare=" + getCostPerShare() +
				", totalQuantity=" + getTotalQuantity() +
				", purchaseDate=" + getPurchaseDate() +
				'}';
	}
}
