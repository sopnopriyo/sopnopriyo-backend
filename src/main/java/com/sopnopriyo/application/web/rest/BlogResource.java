package com.sopnopriyo.application.web.rest;

import com.sopnopriyo.application.domain.Post;
import com.sopnopriyo.application.domain.enumeration.Status;
import com.sopnopriyo.application.repository.PostRepository;
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

import java.util.Optional;

/**
 * BlogResource controller
 */
@RestController
@RequestMapping("/api")
public class BlogResource {

    private final Logger log = LoggerFactory.getLogger(PostResource.class);

    @Value("${jhipster.clientApp.name}")
    private String applicationName;

    private PostRepository postRepository;

    public BlogResource(PostRepository postRepository) {
        this.postRepository = postRepository;
    }

    /**
     * GET  /blogs : get all the posts. -
     *
     * @param pageable the pagination information
     * @return the ResponseEntity with status 200 (OK) and the list of posts in body
     */
    @GetMapping("/blogs")
    @Timed
    public ResponseEntity<Page<Post>> getAllPosts(@RequestParam MultiValueMap<String, String> queryParams, UriComponentsBuilder uriBuilder, Pageable pageable) {
        log.debug("REST request to get a page of blog posts - public");
        Page<Post> page = postRepository.findByStatus(Status.PUBLISHED, pageable);

        HttpHeaders headers = PaginationUtil.generatePaginationHttpHeaders(uriBuilder.queryParams(queryParams), page);
        return new ResponseEntity<>(page, headers, HttpStatus.OK);
    }

    /**
     * GET  /blogs/:slug : get the "slug" post.
     *
     * @param slug the title slug of the post to retrieve
     * @return the ResponseEntity with status 200 (OK) and with body the post, or with status 404 (Not Found)
     */
    @GetMapping("/blogs/{slug}")
    @Timed
    public ResponseEntity<Post> getPost(@PathVariable String slug) {
        log.debug("REST request to get blog post : {} - public", slug);
        Optional<Post> post = postRepository.findBySlug(slug);
        return ResponseUtil.wrapOrNotFound(post);
    }

}
