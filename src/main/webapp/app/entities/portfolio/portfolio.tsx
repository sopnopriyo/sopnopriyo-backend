import React from 'react';
import { connect } from 'react-redux';
import { Link, RouteComponentProps } from 'react-router-dom';
import { Button, Col, Row, Table } from 'reactstrap';
// tslint:disable-next-line:no-unused-variable
import { byteSize, ICrudGetAllAction, TextFormat } from 'react-jhipster';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

import { IRootState } from 'app/shared/reducers';
import { getEntities } from './portfolio.reducer';
import { IPortfolio } from 'app/shared/model/portfolio.model';
// tslint:disable-next-line:no-unused-variable
import { APP_DATE_FORMAT, APP_LOCAL_DATE_FORMAT } from 'app/config/constants';

export interface IPortfolioProps extends StateProps, DispatchProps, RouteComponentProps<{ url: string }> {}

export class Portfolio extends React.Component<IPortfolioProps> {
  componentDidMount() {
    this.props.getEntities();
  }

  render() {
    const { portfolioList, match } = this.props;
    return (
      <div>
        <h2 id="portfolio-heading">
          Portfolios
          <Link to={`${match.url}/new`} className="btn btn-primary float-right jh-create-entity" id="jh-create-entity">
            <FontAwesomeIcon icon="plus" />&nbsp; Create new Portfolio
          </Link>
        </h2>
        <div className="table-responsive">
          <Table responsive>
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Url</th>
                <th>Image</th>
                <th>Description</th>
                <th>Date</th>
                <th />
              </tr>
            </thead>
            <tbody>
              {portfolioList.map((portfolio, i) => (
                <tr key={`entity-${i}`}>
                  <td>
                    <Button tag={Link} to={`${match.url}/${portfolio.id}`} color="link" size="sm">
                      {portfolio.id}
                    </Button>
                  </td>
                  <td>{portfolio.title}</td>
                  <td>{portfolio.url}</td>
                  <td>{portfolio.image ? 'true' : 'false'}</td>
                  <td>{portfolio.description}</td>
                  <td>
                    <TextFormat type="date" value={portfolio.date} format={APP_DATE_FORMAT} />
                  </td>
                  <td className="text-right">
                    <div className="btn-group flex-btn-group-container">
                      <Button tag={Link} to={`${match.url}/${portfolio.id}`} color="info" size="sm">
                        <FontAwesomeIcon icon="eye" /> <span className="d-none d-md-inline">View</span>
                      </Button>
                      <Button tag={Link} to={`${match.url}/${portfolio.id}/edit`} color="primary" size="sm">
                        <FontAwesomeIcon icon="pencil-alt" /> <span className="d-none d-md-inline">Edit</span>
                      </Button>
                      <Button tag={Link} to={`${match.url}/${portfolio.id}/delete`} color="danger" size="sm">
                        <FontAwesomeIcon icon="trash" /> <span className="d-none d-md-inline">Delete</span>
                      </Button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </Table>
        </div>
      </div>
    );
  }
}

const mapStateToProps = ({ portfolio }: IRootState) => ({
  portfolioList: portfolio.entities
});

const mapDispatchToProps = {
  getEntities
};

type StateProps = ReturnType<typeof mapStateToProps>;
type DispatchProps = typeof mapDispatchToProps;

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Portfolio);
