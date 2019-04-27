package com.sopnopriyo.application.web.rest;

import com.sopnopriyo.application.SopnopriyoApp;

import com.sopnopriyo.application.domain.Stock;
import com.sopnopriyo.application.repository.StockRepository;
import com.sopnopriyo.application.web.rest.errors.ExceptionTranslator;

import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.MockitoAnnotations;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.data.web.PageableHandlerMethodArgumentResolver;
import org.springframework.http.MediaType;
import org.springframework.http.converter.json.MappingJackson2HttpMessageConverter;
import org.springframework.test.context.junit4.SpringRunner;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.setup.MockMvcBuilders;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.util.Base64Utils;

import javax.persistence.EntityManager;
import java.time.Instant;
import java.time.temporal.ChronoUnit;
import java.util.List;


import static com.sopnopriyo.application.web.rest.TestUtil.createFormattingConversionService;
import static org.assertj.core.api.Assertions.assertThat;
import static org.hamcrest.Matchers.hasItem;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.*;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;

/**
 * Test class for the StockResource REST controller.
 *
 * @see StockResource
 */
@RunWith(SpringRunner.class)
@SpringBootTest(classes = SopnopriyoApp.class)
public class StockResourceIntTest {


	private static final String DEFAULT_CODE = "AAAAAAAAAA";
	private static final String UPDATED_CODE = "BBBBBBBBBB";

	private static final String DEFAULT_COMPANY_NAME = "AAAAAAAAAA";
	private static final String UPDATED_COMPANY_NAME = "BBBBBBBBBB";

	private static final Double DEFAULT_COST_PER_SHARE = 1111.0;
	private static final Double UPDATED_COST_PER_SHARE = 2222.2;

	private static final int DEFAULT_TOTAL_QUANTITY = 1111;
	private static final int UPDATED_TOTAL_QUANTITY = 2222;

	private static final Instant DEFAULT_PURCHASE_DATE = Instant.ofEpochMilli(0L);
	private static final Instant UPDATED_PURCHASE_DATE = Instant.now().truncatedTo(ChronoUnit.MILLIS);

	@Autowired
	private StockRepository stockRepository;

	@Autowired
	private MappingJackson2HttpMessageConverter jacksonMessageConverter;

	@Autowired
	private PageableHandlerMethodArgumentResolver pageableArgumentResolver;

	@Autowired
	private ExceptionTranslator exceptionTranslator;

	@Autowired
	private EntityManager em;

	private MockMvc restMessageMockMvc;

	private Stock stock;

	@Before
	public void setup() {
		MockitoAnnotations.initMocks(this);
		final StockResource stockResource = new StockResource(stockRepository);
		this.restMessageMockMvc = MockMvcBuilders.standaloneSetup(stockResource)
				.setCustomArgumentResolvers(pageableArgumentResolver)
				.setControllerAdvice(exceptionTranslator)
				.setConversionService(createFormattingConversionService())
				.setMessageConverters(jacksonMessageConverter).build();
	}

	/**
	 * Create an entity for this test.
	 *
	 * This is a static method, as tests for other entities might also need it,
	 * if they test an entity which requires the current entity.
	 */
	public static Stock createEntity(EntityManager em) {
		Stock stock = new Stock()
				.code(DEFAULT_CODE)
				.companyName(DEFAULT_COMPANY_NAME)
				.costPerShare(DEFAULT_COST_PER_SHARE)
				.totalQuantity(DEFAULT_TOTAL_QUANTITY)
				.purchaseDate(DEFAULT_PURCHASE_DATE);
		return stock;
	}

	@Before
	public void initTest() {
		stock = createEntity(em);
	}

	@Test
	@Transactional
	public void createStock() throws Exception {
		int databaseSizeBeforeCreate = stockRepository.findAll().size();

		// Create the Message
		restMessageMockMvc.perform(post("/api/stocks")
				.contentType(TestUtil.APPLICATION_JSON_UTF8)
				.content(TestUtil.convertObjectToJsonBytes(stock)))
				.andExpect(status().isCreated());

		// Validate the Stock in the database
		List<Stock> stockList = stockRepository.findAll();
		assertThat(stockList).hasSize(databaseSizeBeforeCreate + 1);
		Stock testStock = stockList.get(stockList.size() - 1);
		assertThat(testStock.getCode()).isEqualTo(DEFAULT_CODE);
		assertThat(testStock.getCompanyName()).isEqualTo(DEFAULT_COMPANY_NAME);
		assertThat(testStock.getCostPerShare()).isEqualTo(DEFAULT_COST_PER_SHARE);
		assertThat(testStock.getTotalQuantity()).isEqualTo(DEFAULT_TOTAL_QUANTITY);
		assertThat(testStock.getPurchaseDate()).isEqualTo(DEFAULT_PURCHASE_DATE);
	}

    @Test
    @Transactional
    public void createStockWithExistingId() throws Exception {
        int databaseSizeBeforeCreate = stockRepository.findAll().size();

        // Create the Stock with an existing ID
        stock.setId(1L);

        // An entity with an existing ID cannot be created, so this API call must fail
        restMessageMockMvc.perform(post("/api/stocks")
            .contentType(TestUtil.APPLICATION_JSON_UTF8)
            .content(TestUtil.convertObjectToJsonBytes(stock)))
            .andExpect(status().isBadRequest());

        // Validate the Stock in the database
        List<Stock> stockList = stockRepository.findAll();
        assertThat(stockList).hasSize(databaseSizeBeforeCreate);
    }

    @Test
    @Transactional
    public void checkCodeIsRequired() throws Exception {
        int databaseSizeBeforeTest = stockRepository.findAll().size();
        // set the field null
        stock.setCode(null);

        // Create the Message, which fails.

        restMessageMockMvc.perform(post("/api/stocks")
            .contentType(TestUtil.APPLICATION_JSON_UTF8)
            .content(TestUtil.convertObjectToJsonBytes(stock)))
            .andExpect(status().isBadRequest());

        List<Stock> stockList = stockRepository.findAll();
        assertThat(stockList).hasSize(databaseSizeBeforeTest);
    }

	@Test
	@Transactional
	public void checkCompanyNameIsRequired() throws Exception {
		int databaseSizeBeforeTest = stockRepository.findAll().size();
		// set the field null
		stock.setCompanyName(null);

		// Create the Message, which fails.

		restMessageMockMvc.perform(post("/api/stocks")
				.contentType(TestUtil.APPLICATION_JSON_UTF8)
				.content(TestUtil.convertObjectToJsonBytes(stock)))
				.andExpect(status().isBadRequest());

		List<Stock> stockList = stockRepository.findAll();
		assertThat(stockList).hasSize(databaseSizeBeforeTest);
	}

	@Test
	@Transactional
	public void checkCostPerShareIsRequired() throws Exception {
		int databaseSizeBeforeTest = stockRepository.findAll().size();
		// set the field null
		stock.setCostPerShare(null);

		// Create the Message, which fails.

		restMessageMockMvc.perform(post("/api/stocks")
				.contentType(TestUtil.APPLICATION_JSON_UTF8)
				.content(TestUtil.convertObjectToJsonBytes(stock)))
				.andExpect(status().isBadRequest());

		List<Stock> stockList = stockRepository.findAll();
		assertThat(stockList).hasSize(databaseSizeBeforeTest);
	}

	@Test
	@Transactional
	public void checkTotalQuantityIsRequired() throws Exception {
		int databaseSizeBeforeTest = stockRepository.findAll().size();
		// set the field null
		stock.setTotalQuantity(null);

		// Create the Message, which fails.

		restMessageMockMvc.perform(post("/api/stocks")
				.contentType(TestUtil.APPLICATION_JSON_UTF8)
				.content(TestUtil.convertObjectToJsonBytes(stock)))
				.andExpect(status().isBadRequest());

		List<Stock> stockList = stockRepository.findAll();
		assertThat(stockList).hasSize(databaseSizeBeforeTest);
	}

    @Test
    @Transactional
    public void checkPurchaseDateIsRequired() throws Exception {
        int databaseSizeBeforeTest = stockRepository.findAll().size();
        // set the field null
        stock.setPurchaseDate(null);

        // Create the Message, which fails.

        restMessageMockMvc.perform(post("/api/stocks")
            .contentType(TestUtil.APPLICATION_JSON_UTF8)
            .content(TestUtil.convertObjectToJsonBytes(stock)))
            .andExpect(status().isBadRequest());

        List<Stock> messageList = stockRepository.findAll();
        assertThat(messageList).hasSize(databaseSizeBeforeTest);
    }

    @Test
    @Transactional
    public void getAllStocks() throws Exception {
        // Initialize the database
        stockRepository.saveAndFlush(stock);

        // Get all the stockList
        restMessageMockMvc.perform(get("/api/stocks?sort=id,desc"))
            .andExpect(status().isOk())
            .andExpect(content().contentType(MediaType.APPLICATION_JSON_UTF8_VALUE))
            .andExpect(jsonPath("$.[*].id").value(hasItem(stock.getId().intValue())))
            .andExpect(jsonPath("$.[*].code").value(hasItem(DEFAULT_CODE)))
            .andExpect(jsonPath("$.[*].companyName").value(hasItem(DEFAULT_COMPANY_NAME)))
            .andExpect(jsonPath("$.[*].costPerShare").value(hasItem(DEFAULT_COST_PER_SHARE)))
			.andExpect(jsonPath("$.[*].totalQuantity").value(hasItem(DEFAULT_TOTAL_QUANTITY)))
			.andExpect(jsonPath("$.[*].purchaseDate").value(hasItem(DEFAULT_PURCHASE_DATE.toString())));
    }

    @Test
    @Transactional
    public void getStock() throws Exception {
        // Initialize the database
        stockRepository.saveAndFlush(stock);

        // Get the stock
        restMessageMockMvc.perform(get("/api/stocks/{id}", stock.getId()))
            .andExpect(status().isOk())
            .andExpect(content().contentType(MediaType.APPLICATION_JSON_UTF8_VALUE))
            .andExpect(jsonPath("$.id").value(stock.getId().intValue()))
            .andExpect(jsonPath("$.code").value(DEFAULT_CODE))
            .andExpect(jsonPath("$.companyName").value(DEFAULT_COMPANY_NAME))
            .andExpect(jsonPath("$.costPerShare").value(DEFAULT_COST_PER_SHARE))
			.andExpect(jsonPath("$.totalQuantity").value(DEFAULT_TOTAL_QUANTITY))
			.andExpect(jsonPath("$.purchaseDate").value(DEFAULT_PURCHASE_DATE.toString()));
    }

    @Test
    @Transactional
    public void getNonExistingStock() throws Exception {
        // Get the stock
        restMessageMockMvc.perform(get("/api/stocks/{id}", Long.MAX_VALUE))
            .andExpect(status().isNotFound());
    }

    @Test
    @Transactional
    public void updateStock() throws Exception {
        // Initialize the database
        stockRepository.saveAndFlush(stock);

        int databaseSizeBeforeUpdate = stockRepository.findAll().size();

        // Update the stock
        Stock updatedStock = stockRepository.findById(stock.getId()).get();

        // Disconnect from session so that the updates on updatedMessage are not directly saved in db
        em.detach(updatedStock);
		updatedStock
            .code(UPDATED_CODE)
            .companyName(UPDATED_COMPANY_NAME)
            .costPerShare(UPDATED_COST_PER_SHARE)
			.totalQuantity(UPDATED_TOTAL_QUANTITY)
            .purchaseDate(UPDATED_PURCHASE_DATE);

        restMessageMockMvc.perform(put("/api/stocks")
            .contentType(TestUtil.APPLICATION_JSON_UTF8)
            .content(TestUtil.convertObjectToJsonBytes(updatedStock)))
            .andExpect(status().isOk());

        // Validate the Stock in the database
        List<Stock> stockList = stockRepository.findAll();
        assertThat(stockList).hasSize(databaseSizeBeforeUpdate);
        Stock testStock = stockList.get(stockList.size() - 1);
        assertThat(testStock.getCode()).isEqualTo(UPDATED_CODE);
        assertThat(testStock.getCompanyName()).isEqualTo(UPDATED_COMPANY_NAME);
        assertThat(testStock.getCostPerShare()).isEqualTo(UPDATED_COST_PER_SHARE);
        assertThat(testStock.getTotalQuantity()).isEqualTo(UPDATED_TOTAL_QUANTITY);
		assertThat(testStock.getPurchaseDate()).isEqualTo(UPDATED_PURCHASE_DATE.toString());
    }

    @Test
    @Transactional
    public void updateNonExistingStock() throws Exception {
        int databaseSizeBeforeUpdate = stockRepository.findAll().size();

        // Create the Stock

        // If the entity doesn't have an ID, it will throw BadRequestAlertException
        restMessageMockMvc.perform(put("/api/stocks")
            .contentType(TestUtil.APPLICATION_JSON_UTF8)
            .content(TestUtil.convertObjectToJsonBytes(stock)))
            .andExpect(status().isBadRequest());

        // Validate the Stock in the database
        List<Stock> messageList = stockRepository.findAll();
        assertThat(messageList).hasSize(databaseSizeBeforeUpdate);
    }

    @Test
    @Transactional
    public void deleteStock() throws Exception {
        // Initialize the database
        stockRepository.saveAndFlush(stock);

        int databaseSizeBeforeDelete = stockRepository.findAll().size();

        // Get the message
        restMessageMockMvc.perform(delete("/api/stocks/{id}", stock.getId())
            .accept(TestUtil.APPLICATION_JSON_UTF8))
            .andExpect(status().isOk());

        // Validate the database is empty
        List<Stock> stockList = stockRepository.findAll();
        assertThat(stockList).hasSize(databaseSizeBeforeDelete - 1);
    }

    @Test
    @Transactional
    public void equalsVerifier() throws Exception {
        TestUtil.equalsVerifier(Stock.class);
        Stock stock1 = new Stock();
        stock1.setId(1L);
        Stock stock2 = new Stock();
        stock2.setId(stock1.getId());
        assertThat(stock1).isEqualTo(stock2);
        stock2.setId(2L);
        assertThat(stock1).isNotEqualTo(stock2);
        stock1.setId(null);
        assertThat(stock1).isNotEqualTo(stock2);
    }
}
