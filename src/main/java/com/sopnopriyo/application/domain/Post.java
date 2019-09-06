package com.sopnopriyo.application.domain;

import org.hibernate.annotations.Cache;
import org.hibernate.annotations.CacheConcurrencyStrategy;

import javax.persistence.*;
import javax.validation.constraints.*;

import java.io.Serializable;
import java.time.Instant;
import java.util.Objects;

import com.sopnopriyo.application.domain.enumeration.Status;

/**
 * A Post.
 */
@Entity
@Table(name = "post")
@Cache(usage = CacheConcurrencyStrategy.NONSTRICT_READ_WRITE)
public class Post implements Serializable {

    private static final long serialVersionUID = 1L;

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @NotNull
    @Size(max = 191)
    @Column(name = "title", nullable = false)
    private String title;

    
    @Lob
    @Column(name = "sp_body", nullable = false)
    private String body;

    @NotNull
    @Enumerated(EnumType.STRING)
    @Column(name = "status", nullable = false)
    private Status status;

    @NotNull
    @Column(name = "cover_photo_url", nullable = false)
    private String coverPhotoUrl;

    @NotNull
    @Column(name = "slug")
    private String slug;

    @NotNull
    @Column(name = "sp_date", nullable = false)
    private Instant date;

    @Column(name="user_id", nullable = false)
    private long userId;

    // jhipster-needle-entity-add-field - JHipster will add fields here, do not remove
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public Post title(String title) {
        this.title = title;
        return this;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getBody() {
        return body;
    }

    public Post body(String body) {
        this.body = body;
        return this;
    }

    public void setBody(String body) {
        this.body = body;
    }

    public Status getStatus() {
        return status;
    }

    public Post status(Status status) {
        this.status = status;
        return this;
    }

    public void setStatus(Status status) {
        this.status = status;
    }

    public String getCoverPhotoUrl() {
        return coverPhotoUrl;
    }

    public Post coverPhotoUrl(String coverPhotoUrl) {
        this.coverPhotoUrl = coverPhotoUrl;
        return this;
    }

    public void setCoverPhotoUrl(String coverPhotoUrl) {
        this.coverPhotoUrl = coverPhotoUrl;
    }

    public String getSlug() {
        return slug;
    }

    public Post slug(String slug) {
        this.slug =  slug;
        return this;
    }

    public void setSlug(String slug) {
        this.slug = slug;
    }

    public Instant getDate() {
        return date;
    }

    public Post date(Instant date) {
        this.date = date;
        return this;
    }

    public void setDate(Instant date) {
        this.date = date;
    }

    public long getUserId() {
        return userId;
    }

    public Post userId(long userId) {
        this.userId = userId;
        return this;
    }

    public void setUserId(long userId) {
        this.userId = userId;
    }
    // jhipster-needle-entity-add-getters-setters - JHipster will add getters and setters here, do not remove

    @Override
    public boolean equals(Object o) {
        if (this == o) {
            return true;
        }
        if (o == null || getClass() != o.getClass()) {
            return false;
        }
        Post post = (Post) o;
        if (post.getId() == null || getId() == null) {
            return false;
        }
        return Objects.equals(getId(), post.getId());
    }

    @Override
    public int hashCode() {
        return Objects.hashCode(getId());
    }

    @Override
    public String toString() {
        return "Post{" +
            "id=" + getId() +
            ", title='" + getTitle() + "'" +
            ", body='" + getBody() + "'" +
            ", status='" + getStatus() + "'" +
            ", coverPhotoUrl='" + getCoverPhotoUrl() + "'" +
            ", slug='" + getSlug() + "'" +
            ", userId='" + getUserId() + "'" +
            ", date='" + getDate() + "'" +
            "}";
    }
}
