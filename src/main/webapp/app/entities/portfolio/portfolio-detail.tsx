import React from 'react';
import { connect } from 'react-redux';
import { Link, RouteComponentProps } from 'react-router-dom';
import { Button, Row, Col } from 'reactstrap';
// tslint:disable-next-line:no-unused-variable
import { ICrudGetAction, byteSize, TextFormat } from 'react-jhipster';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

import { IRootState } from 'app/shared/reducers';
import { getEntity } from './portfolio.reducer';
import { IPortfolio } from 'app/shared/model/portfolio.model';
// tslint:disable-next-line:no-unused-variable
import { APP_DATE_FORMAT, APP_LOCAL_DATE_FORMAT } from 'app/config/constants';

export interface IPortfolioDetailProps extends StateProps, DispatchProps, RouteComponentProps<{ id: string }> {}

export class PortfolioDetail extends React.Component<IPortfolioDetailProps> {
  componentDidMount() {
    this.props.getEntity(this.props.match.params.id);
  }

  render() {
    const { portfolioEntity } = this.props;
    return (
      <Row>
        <Col md="8">
          <h2>
            Portfolio [<b>{portfolioEntity.id}</b>]
          </h2>
          <dl className="jh-entity-details">
            <dt>
              <span id="title">Title</span>
            </dt>
            <dd>{portfolioEntity.title}</dd>
            <dt>
              <span id="url">Url</span>
            </dt>
            <dd>{portfolioEntity.url}</dd>
            <dt>
              <span id="image">Image</span>
            </dt>
            <dd>{portfolioEntity.image ? 'true' : 'false'}</dd>
            <dt>
              <span id="description">Description</span>
            </dt>
            <dd>{portfolioEntity.description}</dd>
            <dt>
              <span id="date">Date</span>
            </dt>
            <dd>
              <TextFormat value={portfolioEntity.date} type="date" format={APP_DATE_FORMAT} />
            </dd>
          </dl>
          <Button tag={Link} to="/entity/portfolio" replace color="info">
            <FontAwesomeIcon icon="arrow-left" /> <span className="d-none d-md-inline">Back</span>
          </Button>&nbsp;
          <Button tag={Link} to={`/entity/portfolio/${portfolioEntity.id}/edit`} replace color="primary">
            <FontAwesomeIcon icon="pencil-alt" /> <span className="d-none d-md-inline">Edit</span>
          </Button>
        </Col>
      </Row>
    );
  }
}

const mapStateToProps = ({ portfolio }: IRootState) => ({
  portfolioEntity: portfolio.entity
});

const mapDispatchToProps = { getEntity };

type StateProps = ReturnType<typeof mapStateToProps>;
type DispatchProps = typeof mapDispatchToProps;

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(PortfolioDetail);
