package com.sopnopriyo.application.domain;

import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
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
    @GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "sequenceGenerator")
    @SequenceGenerator(name = "sequenceGenerator")
    private Long id;

    @NotNull
    @Size(max = 255)
    @Column(name = "title", length = 255, nullable = false)
    private String title;

    
    @Lob
    @NotNull
    @Column(name = "jhi_body", nullable = false)
    private String body;

    @Enumerated(EnumType.STRING)
    @Column(name = "status")
    private Status status;

    
    @Lob
    @Column(name = "cover_image")
    private byte[] coverImage;

    @Column(name = "cover_image_content_type")
    private String coverImageContentType;

    @NotNull
    @Column(name = "jhi_date")
    private Instant date;
    
    @JsonIgnore
    @ManyToOne
    @JsonIgnoreProperties("")
    private User user;

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

    public byte[] getCoverImage() {
        return coverImage;
    }

    public Post coverImage(byte[] coverImage) {
        this.coverImage = coverImage;
        return this;
    }

    public void setCoverImage(byte[] coverImage) {
        this.coverImage = coverImage;
    }

    public String getCoverImageContentType() {
        return coverImageContentType;
    }

    public Post coverImageContentType(String coverImageContentType) {
        this.coverImageContentType = coverImageContentType;
        return this;
    }

    public void setCoverImageContentType(String coverImageContentType) {
        this.coverImageContentType = coverImageContentType;
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

    public User getUser() {
        return user;
    }

    public Post user(User user) {
        this.user = user;
        return this;
    }

    public void setUser(User user) {
        this.user = user;
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
            ", coverImage='" + getCoverImage() + "'" +
            ", coverImageContentType='" + getCoverImageContentType() + "'" +
            ", date='" + getDate() + "'" +
            "}";
    }
}
