import { Moment } from 'moment';
import { IUser } from './user.model';

export const enum Status {
  DRAFT = 'DRAFT',
  PUBLISHED = 'PUBLISHED'
}

export interface IPost {
  id?: number;
  title?: string;
  body?: any;
  status?: Status;
  coverImageContentType?: string;
  coverImage?: any;
  date?: Moment;
  user?: IUser;
}

export const defaultValue: Readonly<IPost> = {};
