package com.sopnopriyo.application.service;

import com.sopnopriyo.application.domain.Post;
import com.sopnopriyo.application.repository.PostRepository;
import com.sopnopriyo.application.repository.UserRepository;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.cache.CacheManager;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

/**
 * Service class for managing posts.
 */
@Service
@Transactional
public class PostService {

	private final Logger log = LoggerFactory.getLogger(UserService.class);

	private final UserRepository userRepository;
	
	private final PostRepository postRepository;

	private final CacheManager cacheManager;

	public PostService(UserRepository userRepository, PostRepository postRepository, CacheManager cacheManager) {
		this.userRepository = userRepository;
		this.postRepository = postRepository;
		this.cacheManager = cacheManager;
	}

	public Page<Post> findByUserIsCurrentUser(Pageable pageable) {
		return postRepository.findByUserIsCurrentUser(pageable);
	}

}