/**
 * @swagger
 * /api/hello:
 *   get:
 *     operationId: getHelloMessage  # Unique operation name
 *     summary: Returns a hello message from the Custom API
 *     description: This endpoint returns a "Hello World!" message to test the API.
 *     responses:
 *       200:
 *         description: Success - The hello message is returned
 */
const express = require('express');
const router = express.Router();

// Define your route here
router.get('/hello', (req, res) => {
  res.send('Hello World!');
});

/**
 * @swagger
 * /api/hel2lo:
 *   get:
 *     operationId: getHelloMes2sage  # Unique operation name
 *     summary: Returns a hello message from the Custom API
 *     description: This endpoint returns a "Hello World!" message to test the API.
 *     responses:
 *       200:
 *         description: Success - The hello message is returned
 */
// Define your route here
router.get('/hell2o', (req, res) => {
    res.send('Hello World!');
  });

module.exports = router;
