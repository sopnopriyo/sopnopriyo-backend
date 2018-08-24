package com.sopnopriyo.application.service;

import com.sopnopriyo.application.domain.Post;
import com.sopnopriyo.application.repository.PostRepository;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.cache.CacheManager;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
import java.util.Optional;

/**
 * Service class for managing posts.
 */
@Service
@Transactional
public class PostService {

	private final Logger log = LoggerFactory.getLogger(UserService.class);

	private final PostRepository postRepository;

	private final CacheManager cacheManager;

	public PostService(PostRepository postRepository, CacheManager cacheManager) {
		this.postRepository = postRepository;
		this.cacheManager = cacheManager;
	}

    public Optional<Post> findById(Long id) {
        return postRepository.findById(id);
    }

    public List<Post> findAll() {
        return postRepository.findAll();
    }

	public Page<Post> findByUserIsCurrentUser(Pageable pageable) {
		return postRepository.findByUserIsCurrentUser(pageable);
	}

	public Post save(Post post) {
	    return postRepository.save(post);
    }

    public Post saveAndFlush(Post post) {
        return postRepository.saveAndFlush(post);
    }

    public void deleteById(long id) {
	    postRepository.deleteById(id);
    }
}
