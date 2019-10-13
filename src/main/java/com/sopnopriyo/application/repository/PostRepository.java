package com.sopnopriyo.application.repository;

import com.sopnopriyo.application.domain.Post;
import com.sopnopriyo.application.domain.enumeration.Status;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.*;
import org.springframework.stereotype.Repository;

import java.util.List;
import java.util.Optional;

/**
 * Spring Data  repository for the Post entity.
 */
@SuppressWarnings("unused")
@Repository
public interface PostRepository extends JpaRepository<Post, Long> {

    Page<Post> findByUserId(Long id, Pageable pageable);

    Page<Post> findByStatus(Status status, Pageable pageable);

    Optional<Post> findBySlug(String slug);

    @Query("SELECT DISTINCT p.category FROM Post p")
    List<String> findDistinctCategory();
}
