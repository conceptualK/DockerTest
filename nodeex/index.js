// index.js

const express = require('express');
const swaggerUi = require('swagger-ui-express');
const swaggerJsDoc = require('swagger-jsdoc');
const helloRoutes = require('./routes/hello');  // Import hello route file
const goodbyeRoutes = require('./routes/goodbye');  // Import goodbye route file

const app = express();
const port = process.env.PORT || 3000;

// Swagger setup
const swaggerOptions = {
  swaggerDefinition: {
    openapi: '3.0.0', // Correct version for OpenAPI spec
    info: {
      title: 'My API',
      version: '1.0.0',
      description: 'API documentation for my project',
    },
    servers: [
      {
        url: 'http://localhost:3000',
      },
    ],
  },
  apis: ['./routes/*.js'], // Include all route files with Swagger annotations
};

const swaggerDocs = swaggerJsDoc(swaggerOptions);
app.use('/api-docs', swaggerUi.serve, swaggerUi.setup(swaggerDocs));

// Use the imported route files
app.use('/api', helloRoutes);
app.use('/api', goodbyeRoutes);

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
