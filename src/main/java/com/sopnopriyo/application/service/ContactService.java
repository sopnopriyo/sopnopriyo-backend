package com.sopnopriyo.application.service;

import com.sopnopriyo.application.domain.Contact;
import com.sopnopriyo.application.repository.ContactRepository;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.cache.CacheManager;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
import java.util.Optional;

@Service
@Transactional
public class ContactService {
    private final Logger log = LoggerFactory.getLogger(ContactService.class);

    private final ContactRepository contactRepository;

    private final CacheManager cacheManager;

    public ContactService(ContactRepository contactRepository, CacheManager cacheManager) {
        this.contactRepository = contactRepository;
        this.cacheManager = cacheManager;
    }

    public Optional<Contact> findById(Long id) {
        return contactRepository.findById(id);
    }

    public List<Contact> findAll() {
        return contactRepository.findAll();
    }

    public Page<Contact> findAll(Pageable pageable) {
        return contactRepository.findAll(pageable);
    }

    public Contact save(Contact contact) {
        return contactRepository.save(contact);
    }

    public Contact saveAndFlush(Contact contact) {
        return contactRepository.saveAndFlush(contact);
    }

    public void deleteById(long id) {
        contactRepository.deleteById(id);
    }
}
