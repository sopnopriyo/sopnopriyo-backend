package com.sopnopriyo.application.web.rest;

import com.sopnopriyo.application.domain.Stock;
import com.sopnopriyo.application.repository.StockRepository;
import com.sopnopriyo.application.web.rest.errors.BadRequestAlertException;
import io.github.jhipster.web.util.HeaderUtil;
import io.github.jhipster.web.util.PaginationUtil;
import io.github.jhipster.web.util.ResponseUtil;
import io.micrometer.core.annotation.Timed;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.util.MultiValueMap;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.util.UriComponentsBuilder;

import javax.validation.Valid;
import java.net.URI;
import java.net.URISyntaxException;
import java.util.List;
import java.util.Optional;

/**
 * REST controller for managing stock.
 */
@RestController
@RequestMapping("/api")
public class StockResource {

	private final Logger log = LoggerFactory.getLogger(StockResource.class);

	@Value("${jhipster.clientApp.name}")
	private String applicationName;

	private static final String ENTITY_NAME = "stock";

	private StockRepository stockRepository;

	public StockResource(StockRepository stockRepository) {
		this.stockRepository = stockRepository;
	}

	/**
	 * POST  /stocks : Create a new stock.
	 *
	 * @param stock the stock to create
	 * @return the ResponseEntity with status 201 (Created) and with body the new stock, or with status 400 (Bad Request) if the stock has already an ID
	 * @throws URISyntaxException if the Location URI syntax is incorrect
	 */
	@PostMapping("/stocks")
	@Timed
	public ResponseEntity<Stock> createStock(@Valid @RequestBody Stock stock) throws URISyntaxException {
		log.debug("REST request to save stock : {}", stock);
		if (stock.getId() != null) {
			throw new BadRequestAlertException("A new stock cannot already have an ID", ENTITY_NAME, "idexists");
		}
		Stock result = stockRepository.save(stock);
		return ResponseEntity.created(new URI("/api/stocks/" + result.getId()))
				.headers(HeaderUtil.createAlert(applicationName, ENTITY_NAME, result.getId().toString()))
				.body(result);
	}

	/**
	 * PUT  /stocks : Updates an existing stock.
	 *
	 * @param stock the stock to update
	 * @return the ResponseEntity with status 200 (OK) and with body the updated stock,
	 * or with status 400 (Bad Request) if the stock is not valid,
	 * or with status 500 (Internal Server Error) if the stock couldn't be updated
	 * @throws URISyntaxException if the Location URI syntax is incorrect
	 */
	@PutMapping("/stocks")
	@Timed
	public ResponseEntity<Stock> updateStock(@Valid @RequestBody Stock stock) throws URISyntaxException {
		log.debug("REST request to update stock : {}", stock);
		if (stock.getId() == null) {
			throw new BadRequestAlertException("Invalid id", ENTITY_NAME, "idnull");
		}
		Stock result = stockRepository.save(stock);
		return ResponseEntity.ok()
				.headers(HeaderUtil.createAlert(applicationName, ENTITY_NAME, stock.getId().toString()))
				.body(result);
	}

	/**
	 * GET  /stocks : get all the stocks.
	 *
	 * @param pageable the pagination information
	 * @return the ResponseEntity with status 200 (OK) and the list of stocks in body
	 */
	@GetMapping("/stocks")
	@Timed
	public ResponseEntity<List<Stock>> getAllStocks(@RequestParam MultiValueMap<String, String> queryParams, UriComponentsBuilder uriBuilder, Pageable pageable) {
		log.debug("REST request to get a page of Stocks");
		Page<Stock> page = stockRepository.findAll(pageable);
		HttpHeaders headers = PaginationUtil.generatePaginationHttpHeaders(uriBuilder.queryParams(queryParams), page);
		return new ResponseEntity<>(page.getContent(), headers, HttpStatus.OK);
	}

	/**
	 * GET  /stocks/:id : get the "id" stock.
	 *
	 * @param id the id of the stock to retrieve
	 * @return the ResponseEntity with status 200 (OK) and with body the stock, or with status 404 (Not Found)
	 */
	@GetMapping("/stocks/{id}")
	@Timed
	public ResponseEntity<Stock> getStock(@PathVariable Long id) {
		log.debug("REST request to get Stock : {}", id);
		Optional<Stock> stock = stockRepository.findById(id);
		return ResponseUtil.wrapOrNotFound(stock);
	}

	/**
	 * DELETE  /stocks/:id : delete the "id" stock.
	 *
	 * @param id the id of the stock to delete
	 * @return the ResponseEntity with status 200 (OK)
	 */
	@DeleteMapping("/stocks/{id}")
	@Timed
	public ResponseEntity<Void> deleteStock(@PathVariable Long id) {
		log.debug("REST request to delete Stock : {}", id);

		stockRepository.deleteById(id);
		return ResponseEntity.ok().headers(HeaderUtil.createAlert(applicationName, ENTITY_NAME, id.toString())).build();
	}
}

