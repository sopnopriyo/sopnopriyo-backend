package com.sopnopriyo.application.web.rest;

import com.sopnopriyo.application.SopnopriyoApp;
import com.sopnopriyo.application.domain.Post;
import com.sopnopriyo.application.domain.enumeration.Status;
import com.sopnopriyo.application.repository.PostRepository;
import com.sopnopriyo.application.repository.UserRepository;
import com.sopnopriyo.application.web.rest.errors.ExceptionTranslator;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.MockitoAnnotations;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.data.web.PageableHandlerMethodArgumentResolver;
import org.springframework.http.MediaType;
import org.springframework.http.converter.json.MappingJackson2HttpMessageConverter;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.setup.MockMvcBuilders;
import org.springframework.transaction.annotation.Transactional;


import javax.persistence.EntityManager;
import java.time.Instant;

import static com.sopnopriyo.application.web.rest.TestUtil.createFormattingConversionService;
import static org.hamcrest.Matchers.*;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.jsonPath;

/**
 * Test class for the BlogResource REST controller.
 *
 * @see BlogResource
 */
@SpringBootTest(classes = SopnopriyoApp.class)
public class BlogResourceIT {

    private static final String DEFAULT_TITLE = "DDDDDDDDDDDDD";

    private static final String DEFAULT_BODY = "DDDDDDDDDDDDD";

    private static final String DEFAULT_EXCERPT = "AAAAAAAAAAAAAAA";

    private static final Status DEFAULT_STATUS = Status.PUBLISHED;

    private static final String DEFAULT_COVER_PHOTO_URL = "DDDDDDDDDDDDD";

    private static final String DEFAULT_SLUG = "AAAAAAAAAA";

    private static final String DEFAULT_CATEGORY = "AAAAAAAAAA";

    private static final Instant DEFAULT_DATE = Instant.ofEpochMilli(0L);

    @Autowired
    private PostRepository postRepository;

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private MappingJackson2HttpMessageConverter jacksonMessageConverter;

    @Autowired
    private PageableHandlerMethodArgumentResolver pageableArgumentResolver;

    @Autowired
    private ExceptionTranslator exceptionTranslator;

    @Autowired
    private EntityManager em;

    private MockMvc restPostMockMvc;

    private Post post;

    @BeforeEach
    public void setup() {
        MockitoAnnotations.initMocks(this);
        final BlogResource blogResource = new BlogResource(postRepository);
        this.restPostMockMvc = MockMvcBuilders.standaloneSetup(blogResource)
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
    public Post createEntity(EntityManager em) {
        Post post = new Post()
            .title(DEFAULT_TITLE)
            .body(DEFAULT_BODY)
            .excerpt(DEFAULT_EXCERPT)
            .status(DEFAULT_STATUS)
            .coverPhotoUrl(DEFAULT_COVER_PHOTO_URL)
            .slug(DEFAULT_SLUG)
            .category(DEFAULT_CATEGORY)
            .userId(userRepository.findOneByLogin("user").get().getId())
            .date(DEFAULT_DATE);
        return post;
    }

    @BeforeEach
    public void initTest() {
        post = createEntity(em);
    }

    @Test
    @Transactional
    public void getAllPosts() throws Exception {
        // Initialize the database
        postRepository.saveAndFlush(post);

        // Get all the postList
        restPostMockMvc.perform(get("/api/blogs?sort=id,desc"))
            .andExpect(status().isOk())
            .andExpect(content().contentType(MediaType.APPLICATION_JSON_UTF8_VALUE))
            .andExpect(jsonPath("$.content.[*].id").value(hasItem(post.getId().intValue())))
            .andExpect(jsonPath("$.content.[*].title").value(hasItem(DEFAULT_TITLE.toString())))
            .andExpect(jsonPath("$.content.[*].body").value(hasItem(DEFAULT_BODY.toString())))
            .andExpect(jsonPath("$.content.[*].excerpt").value(hasItem(DEFAULT_EXCERPT.toString())))
            .andExpect(jsonPath("$.content.[*].status").value(hasItem(DEFAULT_STATUS.toString())))
            .andExpect(jsonPath("$.content.[*].coverPhotoUrl").value(hasItem(DEFAULT_COVER_PHOTO_URL.toString())))
            .andExpect(jsonPath("$.content.[*].slug").value(hasItem(DEFAULT_SLUG.toString())))
            .andExpect(jsonPath("$.content.[*].category").value(hasItem(DEFAULT_CATEGORY.toString())))
            .andExpect(jsonPath("$.content.[*].date").value(hasItem(DEFAULT_DATE.toString())));
    }

    @Test
    @Transactional
    public void getPost() throws Exception {
        // Initialize the database
        postRepository.saveAndFlush(post);

        // Get the post
        restPostMockMvc.perform(get("/api/blogs/{slug}", post.getSlug()))
            .andExpect(status().isOk())
            .andExpect(content().contentType(MediaType.APPLICATION_JSON_UTF8_VALUE))
            .andExpect(jsonPath("$.id").value(post.getId().intValue()))
            .andExpect(jsonPath("$.title").value(DEFAULT_TITLE.toString()))
            .andExpect(jsonPath("$.body").value(DEFAULT_BODY.toString()))
            .andExpect(jsonPath("$.excerpt").value(DEFAULT_EXCERPT.toString()))
            .andExpect(jsonPath("$.status").value(DEFAULT_STATUS.toString()))
            .andExpect(jsonPath("$.coverPhotoUrl").value(DEFAULT_COVER_PHOTO_URL.toString()))
            .andExpect(jsonPath("$.slug").value(DEFAULT_SLUG.toString()))
            .andExpect(jsonPath("$.category").value(DEFAULT_CATEGORY.toString()))
            .andExpect(jsonPath("$.date").value(DEFAULT_DATE.toString()));
    }

    @Test
    @Transactional
    public  void getCategories() throws Exception {
        // Initialize the database
        postRepository.saveAndFlush(post);

        // Get the categories
        restPostMockMvc.perform(get("/api/blogs/categories"))
            .andExpect(status().isOk())
            .andExpect(content().contentType(MediaType.APPLICATION_JSON_UTF8_VALUE))
            .andExpect(jsonPath("$", hasSize(1)))
            .andExpect(jsonPath("$[0]").value(DEFAULT_CATEGORY));
    }

    @Test
    @Transactional
    public void getNonExistingPost() throws Exception {
        // Get the post
        restPostMockMvc.perform(get("/api/blogs/{id}", Long.MAX_VALUE))
            .andExpect(status().isNotFound());
    }

}
