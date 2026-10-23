# Build Command Restrictions

- **NEVER RUN `npm run build`**: Under NO circumstances should the agent run `npm run build`, `npx vite build`, `yarn build`, or `pnpm build`.
- Avoid building production bundles or compiling production assets automatically.
- Let the user manage builds or dev server independently.
