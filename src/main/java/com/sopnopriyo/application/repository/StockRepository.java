package com.sopnopriyo.application.repository;

import com.sopnopriyo.application.domain.Stock;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

/**
 * Spring Data  repository for the Stock entity.
 */
@SuppressWarnings("unused")
@Repository
public interface StockRepository extends JpaRepository<Stock, Long> {

}