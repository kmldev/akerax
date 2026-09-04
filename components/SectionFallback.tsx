export default function SectionFallback() {
  return (
    <div className="flex h-screen w-full items-center justify-center bg-black">
      <div className="h-16 w-16 animate-pulse rounded-full border border-cyan-400/40 shadow-[0_0_40px_rgba(34,211,238,0.45)]" />
    </div>
  );
}
