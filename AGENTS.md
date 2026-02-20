# AGENTS.md

## Propósito
Este documento define lineamientos para futuros cambios en el proyecto.

## Estilo de código
- Escribir código claro, consistente y legible.
- Mantener funciones/métodos pequeños y con responsabilidad única.
- Evitar duplicación; extraer utilidades cuando aplique.
- Seguir convenciones del framework y del lenguaje usado en cada módulo.
- Siempre usar utf8mb4 y validar tildes.

## Convenciones de rutas
- Mantener nombres de rutas descriptivos y consistentes con el dominio.
- Preferir nombres en `kebab-case` para URIs y en formato semántico para nombres de ruta (`area.recurso.accion`).
- Agrupar rutas por contexto funcional y aplicar prefijos cuando corresponda.
- Proteger rutas según rol/permisos desde middleware.

## Livewire
- Preferir componentes Livewire para secciones dinámicas.
- No mezclar lógica de negocio en vistas.
- Mantener la lógica de estado y eventos dentro del componente Livewire.
- Delegar reglas de negocio complejas a servicios/clases de dominio.

## Naming
- Usar nombres explícitos y orientados al dominio.
- Clases en `PascalCase`, métodos/variables en `camelCase`, constantes en `UPPER_SNAKE_CASE`.
- Archivos y carpetas en `kebab-case` cuando aplique (excepto convenciones del framework).
- Evitar abreviaturas ambiguas.

## Roles y permisos
- Definir roles de forma explícita y centralizada.
- Validar autorización en controladores/componentes y políticas.
- No asumir permisos por interfaz; validar siempre en backend.
- Registrar cambios de roles/permisos relevantes en documentación de PR.

## Checklist de PR
- [ ] Validar estilo y consistencia del código.
- [ ] Confirmar codificación utf8mb4 y correcta visualización de tildes.
- [ ] Verificar que no hay lógica de negocio en vistas.
- [ ] Confirmar uso de Livewire en secciones dinámicas nuevas o modificadas.
- [ ] Revisar naming según convenciones del proyecto.
- [ ] Validar roles/permisos y cobertura de autorización.
- [ ] Ejecutar pruebas y checks relevantes antes de enviar.
- [ ] Documentar contexto, alcance y riesgos del cambio.
