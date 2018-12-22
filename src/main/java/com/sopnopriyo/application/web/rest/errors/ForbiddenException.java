package com.sopnopriyo.application.web.rest.errors;

import org.zalando.problem.AbstractThrowableProblem;
import org.zalando.problem.Status;

public class ForbiddenException extends AbstractThrowableProblem {
    private static final long serialVersionUID = 1L;

    public ForbiddenException(String message) {
        super(ErrorConstants.FORBIDDEN, message, Status.FORBIDDEN);
    }
}
