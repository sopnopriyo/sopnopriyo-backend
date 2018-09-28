import { Moment } from 'moment';

export interface IContact {
  id?: number;
  name?: string;
  email?: string;
  message?: any;
  date?: Moment;
}

export const defaultValue: Readonly<IContact> = {};
