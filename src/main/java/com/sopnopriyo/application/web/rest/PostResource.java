package com.sopnopriyo.application.web.rest;

import com.sopnopriyo.application.domain.Authority;
import com.sopnopriyo.application.domain.Post;
import com.sopnopriyo.application.domain.User;
import com.sopnopriyo.application.repository.PostRepository;
import com.sopnopriyo.application.repository.UserRepository;
import com.sopnopriyo.application.security.AuthoritiesConstants;
import com.sopnopriyo.application.security.SecurityUtils;
import com.sopnopriyo.application.web.rest.errors.BadRequestAlertException;
import com.sopnopriyo.application.web.rest.errors.ForbiddenException;
import com.sopnopriyo.application.web.rest.util.HeaderUtil;
import com.sopnopriyo.application.web.rest.util.PaginationUtil;
import io.github.jhipster.web.util.ResponseUtil;
import io.micrometer.core.annotation.Timed;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;
import java.net.URI;
import java.net.URISyntaxException;

import java.util.List;
import java.util.Optional;

/**
 * REST controller for managing Post.
 */
@RestController
@RequestMapping("/api")
public class PostResource {

    private final Logger log = LoggerFactory.getLogger(PostResource.class);

    private static final String ENTITY_NAME = "post";

    private PostRepository postRepository;

    private UserRepository userRepository;

    public PostResource(PostRepository postRepository, UserRepository userRepository) {
        this.postRepository = postRepository;
        this.userRepository = userRepository;
    }

    /**
     * POST  /posts : Create a new post.
     *
     * @param post the post to create
     * @return the ResponseEntity with status 201 (Created) and with body the new post, or with status 400 (Bad Request) if the post has already an ID
     * @throws URISyntaxException if the Location URI syntax is incorrect
     */
    @PostMapping("/posts")
    @Timed
    public ResponseEntity<Post> createPost(@Valid @RequestBody Post post) throws URISyntaxException {
        log.debug("REST request to save Post : {}", post);
        if (post.getId() != null) {
            throw new BadRequestAlertException("A new post cannot already have an ID", ENTITY_NAME, "idexists");
        }

        //ToDO Handle duplicate slug name exception

        String currentUserLogin = SecurityUtils.getCurrentUserLogin().get();
        Optional<User> loggedInUser = userRepository.findOneByLogin(currentUserLogin);

        post.setUserId(loggedInUser.get().getId());

        Post result = postRepository.save(post);
        return ResponseEntity.created(new URI("/api/posts/" + result.getId()))
            .headers(HeaderUtil.createEntityCreationAlert(ENTITY_NAME, result.getId().toString()))
            .body(result);
    }

    /**
     * PUT  /posts : Updates an existing post.
     *
     * @param post the post to update
     * @return the ResponseEntity with status 200 (OK) and with body the updated post,
     * or with status 400 (Bad Request) if the post is not valid,
     * or with status 500 (Internal Server Error) if the post couldn't be updated
     * @throws URISyntaxException if the Location URI syntax is incorrect
     */
    @PutMapping("/posts")
    @Timed
    public ResponseEntity<Post> updatePost(@Valid @RequestBody Post post) throws URISyntaxException {
        log.debug("REST request to update Post : {}", post);
        if (post.getId() == null) {
            throw new BadRequestAlertException("Invalid id", ENTITY_NAME, "idnull");
        }

        //ToDO Handle duplicate slug name exception

        String currentUserLogin = SecurityUtils.getCurrentUserLogin().get();
        Optional<User> loggedInUser = userRepository.findOneByLogin(currentUserLogin);

        Optional<Post> existingPost = postRepository.findById(post.getId());

        if (existingPost.isPresent()) {
            if (existingPost.get().getUserId() != loggedInUser.get().getId() && !isAdmin(loggedInUser.get())) {
                throw new ForbiddenException("Forbidden");
            }
            post.setUserId(existingPost.get().getUserId());
        }

        Post result = postRepository.save(post);
        return ResponseEntity.ok()
            .headers(HeaderUtil.createEntityUpdateAlert(ENTITY_NAME, post.getId().toString()))
            .body(result);
    }

    /**
     * GET  /posts : get all the posts.
     *
     * @param pageable the pagination information
     * @return the ResponseEntity with status 200 (OK) and the list of posts in body
     */
    @GetMapping("/posts")
    @Timed
    public ResponseEntity<Page<Post>> getAllPosts(Pageable pageable) {
        log.debug("REST request to get a page of Posts");

        String currentUserLogin = SecurityUtils.getCurrentUserLogin().get();
        Optional<User> loggedInUser = userRepository.findOneByLogin(currentUserLogin);

        Page<Post> page;

        if (isAdmin(loggedInUser.get())) {
            page = postRepository.findAll(pageable);
        } else {
            page = postRepository.findByUserId(loggedInUser.get().getId(), pageable);
        }

        HttpHeaders headers = PaginationUtil.generatePaginationHttpHeaders(page, "/api/posts");
        return new ResponseEntity<>(page, headers, HttpStatus.OK);
    }

    /**
     * GET  /posts/:id : get the "id" post.
     *
     * @param id the id of the post to retrieve
     * @return the ResponseEntity with status 200 (OK) and with body the post, or with status 404 (Not Found)
     */
    @GetMapping("/posts/{id}")
    @Timed
    public ResponseEntity<Post> getPost(@PathVariable Long id) {
        log.debug("REST request to get Post : {}", id);
        String currentUserLogin = SecurityUtils.getCurrentUserLogin().get();
        Optional<User> loggedInUser = userRepository.findOneByLogin(currentUserLogin);

        Optional<Post> post = postRepository.findById(id);

        if (post.isPresent()) {
            if ((post.get().getUserId() != loggedInUser.get().getId()) && !isAdmin(loggedInUser.get())) {
                throw new ForbiddenException("Forbidden");
            }
        }

        return ResponseUtil.wrapOrNotFound(post);
    }

    /**
     * DELETE  /posts/:id : delete the "id" post.
     *
     * @param id the id of the post to delete
     * @return the ResponseEntity with status 200 (OK)
     */
    @DeleteMapping("/posts/{id}")
    @Timed
    public ResponseEntity<Void> deletePost(@PathVariable Long id) {
        log.debug("REST request to delete Post : {}", id);

        String currentUserLogin = SecurityUtils.getCurrentUserLogin().get();
        Optional<User> loggedInUser = userRepository.findOneByLogin(currentUserLogin);

        Optional<Post> existingPost = postRepository.findById(id);

        if (existingPost.isPresent()) {
            if (existingPost.get().getUserId() != loggedInUser.get().getId() && !isAdmin(loggedInUser.get())) {
                throw new ForbiddenException("Forbidden");
            }
        }

        postRepository.deleteById(id);
        return ResponseEntity.ok().headers(HeaderUtil.createEntityDeletionAlert(ENTITY_NAME, id.toString())).build();
    }

    /**
     * Check if the given user has admin privilege
     * @param user
     * @return
     */
    private boolean isAdmin(User user) {
        Authority authority = new Authority();
        authority.setName(AuthoritiesConstants.ADMIN);

        return user.getAuthorities().contains(authority);
    }
}
