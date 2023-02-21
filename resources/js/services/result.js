import axios from 'axios';

export const getAllResults = async (page) => {
  try {
    const {data: results} = await axios.get(`/api/v1/result?page=${page}`);

    return results;
  } catch (error) {
    throw error;
  }
};

export const getResultById = async (id) => {
  try {
    const {data: result} = await axios.get(`/api/v1/result/${id}`);

    return result;
  } catch (error) {
    throw error;
  }
};
