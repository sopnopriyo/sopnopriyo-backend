package com.sopnopriyo.application.web.rest;

import com.codahale.metrics.annotation.Timed;
import com.sopnopriyo.application.domain.Post;
import com.sopnopriyo.application.domain.enumeration.Status;
import com.sopnopriyo.application.repository.PostRepository;
import com.sopnopriyo.application.web.rest.util.PaginationUtil;
import io.github.jhipster.web.util.ResponseUtil;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;
import java.util.Optional;

/**
 * BlogResource controller
 */
@RestController
@RequestMapping("/api")
public class BlogResource {

    private final Logger log = LoggerFactory.getLogger(PostResource.class);
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
    public ResponseEntity<Page<Post>> getAllPosts(Pageable pageable) {
        log.debug("REST request to get a page of blog posts - public");
        Page<Post> page = postRepository.findByStatus(Status.PUBLISHED, pageable);
        HttpHeaders headers = PaginationUtil.generatePaginationHttpHeaders(page, "/api/blogs");
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
