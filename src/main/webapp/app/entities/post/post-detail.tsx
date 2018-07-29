import React from 'react';
import { connect } from 'react-redux';
import { Link, RouteComponentProps } from 'react-router-dom';
import { Button, Row, Col } from 'reactstrap';
// tslint:disable-next-line:no-unused-variable
import { ICrudGetAction, openFile, byteSize, TextFormat } from 'react-jhipster';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

import { IRootState } from 'app/shared/reducers';
import { getEntity } from './post.reducer';
import { IPost } from 'app/shared/model/post.model';
// tslint:disable-next-line:no-unused-variable
import { APP_DATE_FORMAT, APP_LOCAL_DATE_FORMAT } from 'app/config/constants';

export interface IPostDetailProps extends StateProps, DispatchProps, RouteComponentProps<{ id: number }> {}

export class PostDetail extends React.Component<IPostDetailProps> {
  componentDidMount() {
    this.props.getEntity(this.props.match.params.id);
  }

  render() {
    const { postEntity } = this.props;
    return (
      <Row>
        <Col md="8">
          <h2>
            Post [<b>{postEntity.id}</b>]
          </h2>
          <dl className="jh-entity-details">
            <dt>
              <span id="title">Title</span>
            </dt>
            <dd>{postEntity.title}</dd>
            <dt>
              <span id="body">Body</span>
            </dt>
            <dd>{postEntity.body}</dd>
            <dt>
              <span id="status">Status</span>
            </dt>
            <dd>{postEntity.status}</dd>
            <dt>
              <span id="coverImage">Cover Image</span>
            </dt>
            <dd>
              {postEntity.coverImage ? (
                <div>
                  <a onClick={openFile(postEntity.coverImageContentType, postEntity.coverImage)}>
                    <img src={`data:${postEntity.coverImageContentType};base64,${postEntity.coverImage}`} style={{ maxHeight: '30px' }} />
                  </a>
                  <span>
                    {postEntity.coverImageContentType}, {byteSize(postEntity.coverImage)}
                  </span>
                </div>
              ) : null}
            </dd>
            <dt>
              <span id="date">Date</span>
            </dt>
            <dd>
              <TextFormat value={postEntity.date} type="date" format={APP_DATE_FORMAT} />
            </dd>
            <dt>User</dt>
            <dd>{postEntity.user ? postEntity.user.id : ''}</dd>
          </dl>
          <Button tag={Link} to="/entity/post" replace color="info">
            <FontAwesomeIcon icon="arrow-left" /> <span className="d-none d-md-inline">Back</span>
          </Button>&nbsp;
          <Button tag={Link} to={`/entity/post/${postEntity.id}/edit`} replace color="primary">
            <FontAwesomeIcon icon="pencil-alt" /> <span className="d-none d-md-inline">Edit</span>
          </Button>
        </Col>
      </Row>
    );
  }
}

const mapStateToProps = ({ post }: IRootState) => ({
  postEntity: post.entity
});

const mapDispatchToProps = { getEntity };

type StateProps = ReturnType<typeof mapStateToProps>;
type DispatchProps = typeof mapDispatchToProps;

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(PostDetail);
