import { Moment } from 'moment';

export interface IPortfolio {
  id?: number;
  title?: string;
  url?: string;
  image?: boolean;
  description?: any;
  date?: Moment;
}

export const defaultValue: Readonly<IPortfolio> = {
  image: false
};
