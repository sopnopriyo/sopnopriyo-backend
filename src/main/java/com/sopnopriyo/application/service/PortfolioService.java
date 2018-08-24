package com.sopnopriyo.application.service;

import com.sopnopriyo.application.domain.Portfolio;
import com.sopnopriyo.application.repository.PortfolioRepository;
import org.springframework.cache.CacheManager;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
import java.util.Optional;

@Service
@Transactional
public class PortfolioService {

    private final PortfolioRepository portfolioRepository;

    private final CacheManager cacheManager;

    public PortfolioService(PortfolioRepository portfolioRepository, CacheManager cacheManager) {
        this.portfolioRepository = portfolioRepository;
        this.cacheManager = cacheManager;
    }

    public Optional<Portfolio> findById(Long id) {
        return portfolioRepository.findById(id);
    }

    public List<Portfolio> findAll() {
        return portfolioRepository.findAll();
    }

    public Page<Portfolio> findAll(Pageable pageable) {
        return portfolioRepository.findAll(pageable);
    }

    public Portfolio save(Portfolio portfolio) {
        return portfolioRepository.save(portfolio);
    }

    public Portfolio saveAndFlush(Portfolio portfolio) {
        return portfolioRepository.saveAndFlush(portfolio);
    }

    public void deleteById(long id) {
        portfolioRepository.deleteById(id);
    }
}
